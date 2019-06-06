<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Entities\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($consultant_id)
    {
        try
        {
            $listClient = Client::where('consultant_id','=',$consultant_id)->paginate(10);
            return response()->json(['status' => true, 'data' => $listClient]);
        }catch (\Exception $e){
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $client = new Client($request->only(['name', 'email', 'phone', 'address', 'observation', 'photo']));
            $client->consultants()->associate($request->input('consultant_id'));
            $client->save();
            return response()->json(['state' => true, 'data' => $client], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = Client::findOrFail($id);
            return response()->json(['state' => true, 'data' => $result], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $result = Client::findOrFail($id);
            $result->update($request->only(['name', 'email', 'phone', 'address', 'observation', 'photo']));
            return response()->json(['state' => true, 'data' => $result], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = Client::findOrFail($id);
            $result->delete();
            return response()->json(['state' => true, 'data' => $result], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
    }
}
