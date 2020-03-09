<?php

namespace App\Http\Controllers;

use App\Egresado;
use Illuminate\Http\Request;

class EgresadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $egresados = \DB::table('Egresado')
                        ->join('Persona','Persona.dui','Egresado.dui')
                        ->join('CarreraEgresado','CarreraEgresado.dui','Egresado.dui')
                        ->join('Carrera','Carrera.idCarrera','CarreraEgresado.idCarrera')
                        ->select('Egresado.dui','Persona.nombre','Persona.apellido','Carrera.carrera')
                        ->get();
        
        return $egresados;
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
     * @param  \App\Egresado  $egresado
     * @return \Illuminate\Http\Response
     */
    public function show(Egresado $egresado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Egresado  $egresado
     * @return \Illuminate\Http\Response
     */
    public function edit(Egresado $egresado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Egresado  $egresado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Egresado $egresado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Egresado  $egresado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egresado $egresado)
    {
        //
    }
}
