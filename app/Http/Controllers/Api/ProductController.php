<?php

namespace App\Http\Controllers\Api;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @param $consultant_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($consultant_id)
    {
       try
       {
           $listProduct = Product::where('consultant_id','=',$consultant_id)->paginate(15);
           return response()->json(['status' => true, 'data' => $listProduct]);
       }catch (\Exception $e){
           return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
       }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $product = new Product($request->only(['name']));
            $product->consultants()->associate($request->input('consultant_id'));
            $product->save();

            return response()->json(['state' => true, 'data' => $product], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
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
            $result = Product::findOrFail($id);
            return response()->json(['state' => true, 'data' => $result], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
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
            $product = Product::findOrFail($id);
            $product->update($request->only(['name']));
            return response()->json(['state' => true, 'data' => $product], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json(['state' => true, 'data' => $product], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
    }
}
