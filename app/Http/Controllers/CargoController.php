<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cargos = Cargo::all();
        return $cargos;
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
        $cargo = new Cargo;

        $cargo->cargo = $request->cargo;
        $cargo->save();
        return response()->json(['Mensaje'=>'Cargo agregado exitosamente'],200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show($cargo)
    {
        $cargos = Cargo::find($cargo);

        if(!$cargos){
            return response()->json(['mensaje'=>'Cargo no existe']);
        }else{
            return $cargos;
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcargo)
    {
        $cargo = Cargo::find($idacargo);
        $cargo->cargo = $request->cargo;
        $cargo->save();
        return response()->json(['Mensaje'=>'Cargo modificado exitosamente'],200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcargo)
    {
        $cargo = Cargo::find($idacargo);
        $cargo->delete();
        return response()->json(['Mensaje'=>'Elemento eliminardo'],200);
        //
    }
}
