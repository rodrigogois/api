<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsultantTest extends TestCase
{
    use DatabaseMigrations;
    private $tokenTest;
    private $userTest;

    /**
     * Api Do Login
     * Obtem o Token
     *
     * @return void
     */
    public function testSingin()
    {
        // criar usuário
        $user = factory(\App\Entities\User::class)->make();
        $this->userTest = $user;

        //Registrar usuário na aplicação
        $responseSingup = $this->json('POST', 'api/auth/signup', $user->toArray());

        //Registrar usuário na aplicação
        $response = $this->json('POST', 'api/auth/signin', $this->userTest->toArray());

        $data = json_decode(json_encode($response),true);

        $this->tokenTest = $data["baseResponse"]["original"]["token"];
    }

    /**
     * Teste Api Listar Consultores
     * Obtem o Token
     *
     * @return void
     */
    public function testIndex()
    {
        $data = factory(\App\Entities\Consultant::class, 10)->create();

        $this->testSingin();

        $response = $this->call('GET','api/consultant',[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(200);
            //->assertJson(['data'=>$data->toArray()]);
    }

    /**
     * Teste Api Exibir Cliente
     * Obtem o Token
     *
     * @return void
     */
    public function testShow()
    {
        $data = factory(\App\Entities\Consultant::class)->create();

        $this->testSingin();

        $response = $this->call('GET', 'api/consultant/'.$data->id ,[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(200)
            ->assertJson(['data'=>$data->toArray()]);
    }

    /**
     * Teste Api Acesso bloqueado para visualizar Clientes
     * Obtem o Token
     *
     * @return void
     */
    public function testApiViewNotFound()
    {
        $this->testSingin();

        $response = $this->call('GET', 'api/consultant/100',[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);
		
		$response->assertStatus(200)
            ->assertJson(['state' => false]);
		
        // TODO: Ajustar tratamento de erros da API com Rodrigo
        //$response->assertStatus(500);
    }

    /**
     * Teste Api Registrar Clientes
     * Obtem o Token
     *
     * @return void
     */
    /*public function testStore()
    {
        $data = factory(\App\Entities\Consultant::class)->make();

        $this->testSingin();

        $response = $this->call('POST', 'api/consultant/', $data->toArray() ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(200)
            ->assertJson(['data'=>$data->toArray()]);
    }*/
	
	/**
     * Teste Api Registrar Clientes
     * Obtem o Token
     *
     * @return void
     */
    /*public function testStoreFail()
    {
        $data = factory(\App\Entities\Consultant::class)->make();

        $this->testSingin();
		
		$falseData = factory(\App\Entities\User::class)->make();

        $response = $this->call('POST', 'api/consultant/', $falseData->toArray() ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(500);
    }*/

    /**
     * Teste Api Atualizar Clientes
     * Obtem o Token
     *
     * @return void
     */
    public function testUpdate()
    {
        $data = factory(\App\Entities\Consultant::class)->create();

        $this->testSingin();

        $data->address = 'Address Fake to test';

        // TODO: Ajustar com Rodrigo o envio que garanta manutenção de todos os dados
        $response = $this->call('PUT', 'api/consultant/'.$data->id, $data->toArray() ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $consultant = \App\Entities\Consultant::where('id','=',$data->id)->first();

        $response->assertStatus(200)
            ->assertJson(['data'=>$consultant->toArray()]);
    }
	
	/**
     * Teste Api Atualizar Clientes
     * Obtem o Token
     *
     * @return void
     */
    public function testUpdateFail()
    {
        $data = factory(\App\Entities\Consultant::class)->create();

        $this->testSingin();

        $data->id = 100;

        // TODO: Ajustar com Rodrigo o envio que garanta manutenção de todos os dados
        $response = $this->call('PUT', 'api/consultant/'.$data->id, $data->toArray() ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $consultant = \App\Entities\Consultant::where('id','=',$data->id)->first();

        $response->assertStatus(500);
    }

    /**
     * Teste Api Deletar Consultor
     * Obtem o Token
     *
     * @return void
     */
    /*public function testDestroy()
    {
        $data = factory(\App\Entities\Consultant::class)->create();

        $this->testSingin();

        $response = $this->call('DELETE', 'api/consultant/'.$data->id, [] ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(200)
            ->assertJson(['data'=>$data->toArray()]);
    }*/
	
	/**
     * Teste Api Deletar Consultor
     * Obtem o Token
     *
     * @return void
     */
    /*public function testDestroyFail()
    {
        $this->testSingin();

        $response = $this->call('DELETE', 'api/consultant/100', [] ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(500);

    }*/

}
