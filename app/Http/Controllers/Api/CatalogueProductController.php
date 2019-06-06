<?php

namespace App\Http\Controllers\Api;

use App\Entities\CatalogueProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogueProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $id_catalogue
     * @return \Illuminate\Http\Response
     */
    public function index($id_catalogue)
    {
        try
        {
            $listCatalogueProduct = CatalogueProduct::with('product')->where('catalogue_id','=',$id_catalogue)->paginate(15);
            return response()->json(['status' => true, 'data' => $listCatalogueProduct]);
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

            $productCatalogue = new CatalogueProduct($request->only(['code', 'value', 'status']));
            $productCatalogue->consultants()->associate($request->input('catalogue_id'));
            $productCatalogue->products()->associate($request->input('product_id'));
            $productCatalogue->save();

            return response()->json(['state' => true, 'data' => $productCatalogue], 200);
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
            $result = CatalogueProduct::findOrFail($id);
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
            $productCatalogue = CatalogueProduct::findOrFail($id);
            $productCatalogue->update($request->only(['code', 'value', 'status']));
            response()->json(['state' => true, 'data' => $productCatalogue], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $productCatalogue = CatalogueProduct::findOrFail($id);
            $productCatalogue->delete();
            return response()->json(['state' => true, 'data' => $productCatalogue], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
    }
}
