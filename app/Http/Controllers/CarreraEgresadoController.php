<?php

namespace App\Http\Controllers;

use App\CarreraEgresado;
use Illuminate\Http\Request;

class CarreraEgresadoController extends Controller
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

        $carreras = \DB::table('CarreraEgresado')
        ->join('Carrera','Carrera.idcarrera','=','CarreraEgresado.idcarrera')
        ->select('Carrera.carrera')
        ->where('CarreraEgresado.dui',$dui)
        ->get();

        return $carreras;
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
        $carreraeg = new CarreraEgresado;

        $log = new LogsController();
        $dui = $log->getLogUser();
        
        $carreraeg->idcarrera = $request->idcarrera;
        $carreraeg->dui = $dui;
        $carreraeg->save();
        return response()->json(['Mensaje'=>'Carrera agregada exitosamente'],200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarreraEgresado  $carreraEgresado
     * @return \Illuminate\Http\Response
     */
    public function show($duiEgresado)
    {
        $carreras = \DB::table('CarreraEgresado')
        ->join('Carrera','Carrera.idcarrera','=','CarreraEgresado.idcarrera')
        ->select('Carrera.carrera')
        ->where('CarreraEgresado.dui',$duiEgresado)
        ->get();

        return $carreras;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarreraEgresado  $carreraEgresado
     * @return \Illuminate\Http\Response
     */
    public function edit(CarreraEgresado $carreraEgresado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarreraEgresado  $carreraEgresado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarreraEgresado $carreraEgresado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarreraEgresado  $carreraEgresado
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarreraEgresado $carreraEgresado)
    {
        //
    }
}
