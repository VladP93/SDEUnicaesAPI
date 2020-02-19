<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ubicacion=Ubicacion::all();
        return $ubicacion;
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
        $ubicacion = new Ubicacion;

        $ubicacion->idmunicipio = $request->idmunicipio;
        $ubicacion->direccion = $request->direccion;
        $ubicacion->save();
        return response()->json(['Mensaje'=>'Ubicacion agregada exitosamente'],200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function show($idubicacion)
    {
        $ubicacion=Departamento::find($idubicacion);
        if(!$ubicacion){
            return response()->json(['mensaje'=>'Ubicacion no encontrada']);
        }else{
            return $ubicacion;
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idubicacion)
    {
        $ubicacion = Ubicacion::find($idubicacion);
        $ubicacion->direccion = $request->direccion;
        $ubicacion->save();
        return response()->json(['Mensaje'=>'Dirección modificada exitosamente'],200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($idubicacion)
    {
        $ubicacion = Aptitud::find($idubicacion);
        $ubicacion->delete();
        return response()->json(['Mensaje'=>'Elemento eliminardo'],200);
        //
    }
}
