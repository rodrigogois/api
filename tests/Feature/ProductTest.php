<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
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
     * Teste Api Listar Produtos
     * Obtem o Token
     *
     * @return void
     */
    public function testIndex()
    {
        $data = factory(\App\Entities\Product::class, 20)->create();

        $this->testSingin();

        $response = $this->call('GET','api/product',[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(200);
            //->assertJson(['data'=>$data->toArray()]);
    }
	
	/**
     * Teste Api Listar Produtos
     * Obtem o Token
     *
     * @return void
     */
    public function testIndexFail()
    {
        
        $this->testSingin();

        $response = $this->call('GET','api/product/2',[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(500);
    }

    /**
     * Teste Api Exibir Produto
     * Obtem o Token
     *
     * @return void
     */
    public function testShow()
    {
        $data = factory(\App\Entities\Product::class)->create();

        $this->testSingin();

        $response = $this->call('GET', 'api/product/'.$data->id ,[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);
		
        $response->assertStatus(200);
        $response->assertJson(['data'=>$data->toArray()]);
		
    }

    /**
     * Teste Api Acesso bloqueado para visualizar Produtos
     * Obtem o Token
     *
     * @return void
     */
    public function testShowNotFound()
    {
        $this->testSingin();

        $response = $this->call('GET', 'api/product/100',[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        // TODO: Ajustar tratamento de erros da API com Rodrigo
        $response->assertStatus(500);
    }

    /**
     * Teste Api Registrar Produtos
     * Obtem o Token
     *
     * @return void
     */
    public function testStore()
    {
        $data = factory(\App\Entities\Product::class)->make();

        $this->testSingin();

        $response = $this->call('POST', 'api/product/', $data->toArray() ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(200)
            ->assertJson(['data'=>$data->toArray()]);
    }
	
	/**
     * Teste Api Registrar Produtos
     * Obtem o Token
     *
     * @return void
     */
    public function testStoreFail()
    {
        $data = factory(\App\Entities\Product::class)->make();

        $this->testSingin();
		
		$falseData = factory(\App\Entities\User::class)->make();

        $response = $this->call('POST', 'api/product/', $falseData->toArray() ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(500);
    }

    /**
     * Teste Api Atualizar Produtos
     * Obtem o Token
     *
     * @return void
     */
    public function testUpdate()
    {
        $data = factory(\App\Entities\Product::class)->create();
		
        $this->testSingin();

        $data->quantity = 13;

        // TODO: Ajustar com Rodrigo o envio que garanta manutenção de todos os dados
        $response = $this->call('PUT', 'api/product/'.$data->id, $data->toArray() ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $product = \App\Entities\Product::where('id','=',$data->id)->first();

        $response->assertStatus(200)
						->assertJson(['data'=>$product->toArray()]);
    }
	
	/**
     * Teste Api Atualizar Produtos
     * Obtem o Token
     *
     * @return void
     */
    public function testUpdateFail()
    {
        $data = factory(\App\Entities\Product::class)->create();

        $this->testSingin();

        $data->id = 100;

        // TODO: Ajustar com Rodrigo o envio que garanta manutenção de todos os dados
        $response = $this->call('PUT', 'api/product/'.$data->id, $data->toArray() ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(500);
    }

    /**
     * Teste Api Deletar Produtos
     * Obtem o Token
     *
     * @return void
     */
    public function testDestroy()
    {
        $data = factory(\App\Entities\Product::class)->create();

        $this->testSingin();

        $response = $this->call('DELETE', 'api/product/'.$data->id, [] ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(200)
            ->assertJson(['data'=>$data->toArray()]);
    }
	
	/**
     * Teste Api Deletar Produtos
     * Obtem o Token
     *
     * @return void
     */
    public function testDestroyFail()
    {
        $this->testSingin();

        $response = $this->call('DELETE', 'api/product/100', [] ,[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(500);

    }

}
