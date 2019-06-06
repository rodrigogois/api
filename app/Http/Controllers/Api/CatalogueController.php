<?php

namespace App\Http\Controllers\Api;
use App\Entities\Catalogue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $consultant_id
     * @return \Illuminate\Http\Response
     */
    public function index($consultant_id)
    {
        try
        {
            $listCatalogue = Catalogue::where('consultant_id','=',$consultant_id)->paginate(15);
            return response()->json(['status' => true, 'data' => $listCatalogue]);
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
            $catalogue = new Catalogue($request->only(['name', 'code_catalogue', 'date_expiration', 'date_rescue']));
            $catalogue->consultants()->associate($request->input('consultant_id'));
            $catalogue->save();

            return response()->json(['state' => true, 'data' => $catalogue], 200);
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
            $result = Catalogue::findOrFail($id);
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
            $catalogue = Catalogue::findOrFail($id);
            $catalogue->update($request->only(['name', 'code_catalogue', 'date_expiration', 'date_rescue']));
            response()->json(['state' => true, 'data' => $catalogue], 200);
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
            $catalogue = Catalogue::findOrFail($id);
            $catalogue->delete();
            return response()->json(['state' => true, 'data' => $catalogue], 200);
        } catch (\Exception $e) {
            return response()->json(['state' => false, 'data' => null, 'error' => $e->getMessage()], 500);
        }
    }
}
