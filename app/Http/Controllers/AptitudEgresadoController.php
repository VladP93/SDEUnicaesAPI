<?php

namespace App\Http\Controllers;

use App\AptitudEgresado;
use Illuminate\Http\Request;

class AptitudEgresadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $log = new LogsController();
        $dui = $log->getLogUser();

        $aptitudes = \DB::table('AptitudEgresado')
        ->join('Aptitud','Aptitud.idaptitud','=','AptitudEgresado.idaptitud')
        ->select('Aptitud.aptitud')
        ->where('AptitudEgresado.dui',$dui)
        ->get();

        return $aptitudes;
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
        $aptitudeg = new AptitudEgresado;

        $log = new LogsController();
        $dui = $log->getLogUser();

        $aptitudeg->idaptitud = $request->idaptitud;
        $aptitudeg->dui = $dui;
        $aptitudeg->save();
        return response()->json(['Mensaje'=>'Aptitud agregada exitosamente'],200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\aptitudegresado  $aptitudegresado
     * @return \Illuminate\Http\Response
     */
    public function show($idaptitudegresado)
    {
        $aptitudes = \DB::table('AptitudEgresado')
        ->join('Aptitud','Aptitud.idaptitud','=','AptitudEgresado.idaptitud')
        ->select('Aptitud.aptitud')
        ->where('AptitudEgresado.dui',$idaptitudegresado)
        ->get();

        return $aptitudes;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\aptitudegresado  $aptitudegresado
     * @return \Illuminate\Http\Response
     */
    public function edit(aptitudegresado $aptitudegresado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\aptitudegresado  $aptitudegresado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aptitudegresado $aptitudegresado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\aptitudegresado  $aptitudegresado
     * @return \Illuminate\Http\Response
     */
    public function destroy(aptitudegresado $aptitudegresado)
    {
        //
    }
}
