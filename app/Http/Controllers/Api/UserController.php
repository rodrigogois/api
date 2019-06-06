<?php

namespace App\Http\Controllers\Api;

use App\Entities\Consultant;
use App\Http\Controllers\Controller;
use App\Entities\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return response()->json(['status' => true, 'data' => User::all()]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function store(Request $request)
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

            //verificar se é pra logar com o usuario ou retorna o proprio usuario

            return response()->json(['state'=> true, 'data' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()],500);
        }
    }
}
