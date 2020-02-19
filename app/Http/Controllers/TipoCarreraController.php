<?php

namespace App\Http\Controllers;

use App\TipoCarrera;
use Illuminate\Http\Request;

class TipoCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tiposcarrera = TipoCarrera::all();
        return $tiposcarrera;
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
        $tipoCarrera = new TipoCarrera;

        $tipoCarrera->tipocarrera = $request->tipocarrera;
        $tipoCarrera->save();

        return response()->json(['Mensaje'=>'Tipo de carrera agregado exitosamente'],200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoCarrera  $tipoCarrera
     * @return \Illuminate\Http\Response
     */
    public function show($tipoCarrera)
    {
        $tiposcarrera = TipoCarrera::find($tipoCarrera);
        if(!$tiposcarrera){
            return response()->json(['mensaje'=>'Tipo de carrera no definido']);
        }else{
            return $tiposcarrera;
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoCarrera  $tipoCarrera
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoCarrera $tipoCarrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoCarrera  $tipoCarrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idtipoCarrera)
    {
        $tipoCarrera = TipoCarrera::find($idtipocarrera);
        $tipoCarrera->tipocarrera = $request->tipocarrera;
        $tipoCarrera->save();
        return response()->json(['Mensaje'=>'El tipo de la carrera ha sido modificado exitosamente'],200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoCarrera  $tipoCarrera
     * @return \Illuminate\Http\Response
     */
    public function destroy($idtipoCarrera)
    {
        $tipoCarrera = TipoCarrera::find($idtipoCarrera);
        $tipoCarrera->delete();
        return response()->json(['Mensaje'=>'Elemento eliminardo'],200);
        //
    }
}
