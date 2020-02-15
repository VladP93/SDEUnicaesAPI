<?php

namespace App\Http\Controllers;

use App\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones = \DB::table('Institucion')
        ->join('Ubicacion','Institucion.ubicacion','=','Ubicacion.idubicacion')
        ->join('Municipio','Ubicacion.idmunicipio','=','Municipio.idmunicipio')
        ->join('Departamento','Municipio.iddepartamento','=','Departamento.iddepartamento')
        ->select('idinstitucion','Institucion.nombre','Ubicacion.direccion','Departamento.departamento','Municipio.municipio')
        ->get();
        return $instituciones;
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
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show($institucion)
    {
        $instituciones = \DB::table('Institucion')
        ->join('Ubicacion','Institucion.ubicacion','=','Ubicacion.idubicacion')
        ->join('Municipio','Ubicacion.idmunicipio','=','Municipio.idmunicipio')
        ->join('Departamento','Municipio.iddepartamento','=','Departamento.iddepartamento')
        ->select('idinstitucion','Institucion.nombre','Ubicacion.direccion','Departamento.departamento','Municipio.municipio')
        ->where('Institucion.idinstitucion',$institucion)
        ->get();
        return $instituciones;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Institucion $institucion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institucion $institucion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucion)
    {
        //
    }
}
