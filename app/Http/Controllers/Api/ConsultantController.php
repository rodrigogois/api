<?php

namespace App\Http\Controllers\Api;

use App\Entities\Consultant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status' => true, 'data' => Consultant::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $consultant = Consultant::with('user')->findOrFail($id);
            return response()->json(['state' => true, 'data' => $consultant],200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $result = Consultant::findOrFail($id);
            $result->update($request->only(['address', 'photo', 'phone']));
            return response()->json(['state'=>true, 'data'=> $result],200);
        } catch (\Exception $e) {
            return response()->json(['state'=>false, 'data'=> null, 'error' => $e->getMessage()], 500);
        }
    }
}
