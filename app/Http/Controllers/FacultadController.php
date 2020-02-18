<?php

namespace App\Http\Controllers;

use App\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
#        $facultad=Facultad::with('Ubicacion')->get();
#        return $facultad;
        //

        $facultad = Facultad::all();
        return $facultad;

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
        $facultad = new Facultad;

        $facultad->facultad = $request->facultad;
        $facultad->idubicacion = 1;
        $facultad->save();
        return response()->json(['Mensaje'=>'Facultad agregada exitosamente'],200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function show($facultad)
    {
        $facultad = Facultad::find($facultad);
        return $facultad;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function edit(Facultad $facultad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idfacultad)
    {
        $facultad = Facultad::find($idfacultad);
        $facultad->facultad = $request->facultad;
        $facultad->save();
        return response()->json(['Mensaje'=>'Facultad modificada exitosamente'],200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facultad $facultad)
    {
        //
    }
}
