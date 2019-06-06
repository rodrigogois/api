<?php

namespace App\Http\Controllers\Api;

use App\Entities\User;
use App\Entities\Consultant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Hash;
use Mockery\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{



    public function store(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

            $consultant = new Consultant([
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'photo' => $request->input('address'),
            ]);
            $consultant->user()->associate($user->id);
            $consultant->save();

            $consultantUser = User::with('consultant')->findOrFail($user->id);

            return response()->json(["data" => $consultantUser], 200);
        } catch (\Exception $e) {
            throw  new \Exception($e->getMessage(), 401);
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function authenticated(Request $request)
    {

        $credentials = $request->only('email', 'password');
        try {
            // Get user by email
            $user = User::where('email', $credentials['email'])->first();

            // Validate Company
            if(!$user) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }

            // Validate Password
            if (!Hash::check($credentials['password'], $user->password)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }

            // Generate Token
            $token = JWTAuth::fromUser($user);

            // Get expiration time
            $objectToken = JWTAuth::setToken($token);
            $expiration = JWTAuth::decode($objectToken->getToken())->get('exp');

            //$user = JWTAuth::toUser($token);
            //$expiration = JWTAuth::decode($token)->get('exp');
            $consultantUser = User::with('consultant')->findOrFail($user->id);

        } catch (JWTException $ex) {
            throw  new \Exception($ex->getMessage(), $ex->getStatusCode());

        }
        if (!$token) {
            throw  new \Exception("invalid_credentials: ", 401);
           // throw response()->json(['status' => false, 'error' => 'invalid_credentials'], 401);
        }
        return response()->json(['data' => $consultantUser, 'token' => $token, 'expires_in'=> $expiration],200);
    }


    public function loginAuth(Request $request)
    {
        try {
            $consultant = $this->store($request);
            $token = $this->authenticated($request);

            $arrayConsultant = $consultant->getData(true);
            $arrayToken = $token->getData(true);

            return response()->json(['data' => $arrayConsultant['data'],'token' => $arrayToken['token'], 'expires_in'=> $arrayToken['expires_in']],200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
            //return response()->json(['data' => null, 'error' => $e->getMessage()], 500);
        }

    }

    /**
     * Obter usuario logado
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            throw response()->json(['error' => 'token_expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            throw response()->json(['error' => 'token_invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            throw response()->json(['error' => 'token_absent'], $e->getStatusCode());
        }

        $consultant = User::with('consultant')->findOrFail($user->id);
        // the token is valid and we have found the user via the sub claim
        return response()->json(['user' => $consultant]);
    }


    /**
     * Renovar token expirado
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken()
    {
        $token = JWTAuth::getToken();
        if (!$token) {
            return response()->json(compact('Token doesn\'t exist'), 401);
        }

        try {
            $token = JWTAuth::refresh($token);
        } catch (TokenInvalidException $e) {
            return response()->json(compact('Token doesn\'t exist'), 401);
        }

        return response()->json(compact('token'), 200);
    }
}
