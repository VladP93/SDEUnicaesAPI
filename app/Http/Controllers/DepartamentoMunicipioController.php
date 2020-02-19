<?php

namespace App\Http\Controllers;

use App\Municipio;
use App\Departamento;
use Illuminate\Http\Request;

class DepartamentoMunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = \DB::table('Municipio')
        ->join('Departamento','Departamento.iddepartamento','=','Municipio.iddepartamento')
        ->select('Municipio.idmunicipio','Municipio.municipio','Departamento.departamento')
        ->get();
        return $municipios;
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show($iddepartamento)
    {
        $municipios = \DB::table('Municipio')
        ->join('Departamento','Departamento.iddepartamento','=','Municipio.iddepartamento')
        ->select('Municipio.idmunicipio','Municipio.municipio','Departamento.departamento')
        ->where('Municipio.iddepartamento','=',$iddepartamento)
        ->get();
        return $municipios;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        return response()->json(['Mensaje'=>'No se pueden eliminar elementos de esta tabla'],200);
        //
    }
}
