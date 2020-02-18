<?php

namespace App\Http\Controllers;

use App\Decano;
use Illuminate\Http\Request;

class DecanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $decanos = \DB::table('Decano')
        ->join('Persona','Decano.dui','=','Persona.dui')
        ->join('Facultad','Decano.facultad','=','Facultad.idfacultad')
        ->select('Persona.dui','Persona.nombre','Persona.apellido','Persona.correo','Facultad.facultad')
        ->get();
        return $decanos;
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
        $decano = new Decano;

        $decano->dui = $request->dui;
        $decano->facultad = $request->facultad;
        $decano->save();
        return response()->json(['Mensaje'=>'Decano registrado exitosamente'],200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Decano  $decano
     * @return \Illuminate\Http\Response
     */
    public function show($decano)
    {
        $decanos = \DB::table('Decano')
        ->join('Persona','Decano.dui','=','Persona.dui')
        ->join('Facultad','Decano.facultad','=','Facultad.idfacultad')
        ->select('Persona.dui','Persona.nombre','Persona.apellido','Persona.correo','Facultad.facultad')
        ->where('Persona.dui',$decano)
        ->get();
        return $decanos;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Decano  $decano
     * @return \Illuminate\Http\Response
     */
    public function edit(Decano $decano)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Decano  $decano
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Decano $decano)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Decano  $decano
     * @return \Illuminate\Http\Response
     */
    public function destroy(Decano $decano)
    {
        //
    }
}
