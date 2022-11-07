<?php

namespace App\Http\Controllers;

use App\Imports\BienesImport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Bien;
use Maatwebsite\Excel\Excel;
class BienController extends Controller

{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function index (Request $request)
    {   $id=$request->id;
        $separador=",";
        $ids = explode($separador,$id);
        $bienes=[];
        foreach ($ids as $id){
            $bienes[] = Bien::where('id',$id)->get();
        }
                for ($i=0,$long=count($ids);$i<$long;++$i){
            $biene[]=$bienes[0][0] ;
        }



        $user = auth()->user();
        $data = [$biene,$user];
       return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bien = new Bien();
        $bien->articulo = $request->articulo;
        $bien->descripcion = $request->descripcion;
        //$bien->user_id=auth()->user()->id;


        $articulo =$request->user()->biens()->save($bien);
            return $articulo;

       // ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $bien = Bien::findOrFail($request->id);
        $bien->articulo = $request->articulo;
        $bien->descripcion = $request->descripcion;
        $bien->user_base_id= auth()->user()->getAuthIdentifier();
        $bien->save();
        return  response()->json([
        'message'=>'¡Bien modificado exitosamente!',
        'bien'=>$bien
    ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $bienes = Bien::destroy($request->id);
        return response()->json([
            'message'=>'¡articulo eliminado exitosamente!',
            'bienes'=>$bienes
        ],201);
    }

    public function import()
    {
        Excel::import(new BienesImport(),'database/imports/reto.csv');
        return response()->json([
            'message'=>'¡Importacion exitosa!'
        ],201);
    }

}
