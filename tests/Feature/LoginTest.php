<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginTest extends TestCase
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
    public function testSingup()
    {
        // criar usuário
        $user = factory(\App\Entities\User::class)->make();
        $this->userTest = $user;

        //Registrar usuário na aplicação
        $response = $this->json('POST', 'api/auth/signup', $user->toArray());

        $data = json_decode(json_encode($response),true);

        $response->assertStatus(200);

        $this->tokenTest = $data["baseResponse"]["original"]["token"];

    }

    /**
     * Api Do Login
     * Obtem o Token
     *
     * @return void
     */
    public function testSingin()
    {
        //Registrar usuário na aplicação
        $this->testSingup();

        //Registrar usuário na aplicação
        $response = $this->json('POST', 'api/auth/signin', $this->userTest->toArray());

        $data = json_decode(json_encode($response),true);
        $response->assertStatus(200);

        $this->tokenTest = $data["baseResponse"]["original"]["token"];
    }
	
	/**
     * Api Do Login
     * Obtem o Token
     *
     * @return void
     */
    public function testSinginFail()
    {
		// criar usuário
		$user = factory(\App\Entities\User::class)->make();
        
		//Sem Registrar usuário na aplicação

        //Registrar usuário na aplicação
        $response = $this->json('POST', 'api/auth/signin', $user->toArray());

        $response->assertStatus(401);

    }

    /**
     * Api Get authenticated User
     *Usando consultant view para verificar authenticate true
     *
     * @return void
     */
    public function testGetAuthenticatedUser()
    {
        $this->testSingin();

        // aplicado para recarregar a aplicação e poder enviar o token
        $this->refreshApplication();

        /* MODELO ALTERNATIVO
        $headers = [
        'Accept'        => 'application/vnd.laravel.v1+json',
        'AUTHORIZATION' => 'Bearer ' . $this->tokenTest
        ];

        $response = $this->get('api/getUser', $headers);
        */
        $response = $this->call('GET', 'api/auth/user', [],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(200);
    }
	
	/**
     * Api Get authenticated User
     *Usando consultant view para verificar authenticate true
     *
     * @return void
     */
    /*Uncaught exception*/
	public function testGetAuthenticatedUserFail()
    {
		$user = factory(\App\Entities\User::class)->make();
        $tokenNotAuthenticated = JWTAuth::fromUser($user);
		
        $this->testSingin();

        // aplicado para recarregar a aplicação e poder enviar o token
        $this->refreshApplication();

        $response = $this->call('GET', 'api/auth/user', [],[],[], ['HTTP_Authorization' => 'Bearer '.$tokenNotAuthenticated], []);

        $response->assertStatus(404);
    }

    /**
     * Api Logged
     *Usando consultant view para verificar authenticate true
     *
     * @return void
     */
    public function testLoggedAPI()
    {
        $this->testSingin();
        $userConsultant = \App\Entities\User::where('email','=',$this->userTest->email)->first();

        $response = $this->call('GET', 'api/consultant/'.$userConsultant->consultant->id.'/',[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $Consultant = json_decode(json_encode($response),true);

        $response->assertStatus(200)
            ->assertJson(['state'=>true]);
    }

    public function testRefreshToken()
    {
        $this->testSingin();

        $response = $this->call('GET', 'api/token/refresh',[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $response->assertStatus(200);

    }
	
	/*public function testRefreshTokenFail()
    {
        $user = factory(\App\Entities\User::class)->make();
        $tokenNotAuthenticated = JWTAuth::fromUser($user);
		
		$this->testSingin();
		
        $response = $this->call('GET', 'api/token/refresh',[],[],[], ['HTTP_Authorization' => 'Bearer '.$tokenNotAuthenticated], []);
		
		dump($response);
        $response->assertStatus(401);

    }*/

    public function testBehaviorRefreshToken()
    {
        $this->testSingin();

        $this->refreshApplication();

        $responseValid = $this->call('GET', 'api/token/refresh',[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);
        $responseError = $this->call('GET', 'api/token/refresh',[],[],[], ['HTTP_Authorization' => 'Bearer ' . $this->tokenTest], []);

        $responseError->assertStatus(401);

    }
}
