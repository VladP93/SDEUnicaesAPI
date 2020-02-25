<?php

namespace App\Http\Controllers;

use App\diplomacertificacionegresado;
use Illuminate\Http\Request;

class DiplomaEgresadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplomas = \DB::table('DiplomaCertificacionEgresado')
        ->join('DiplomaCertificacion','DiplomaCertificacion.iddiplomadocertificacion','=','DiplomaCertificacionEgresado.diplomacertificacion')
        ->select('DiplomaCertificacionEgresado.dui', 'DiplomaCertificacion.nombre')
        ->get();

        return $diplomas;
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
     * @param  \App\diplomacertificacionegresado  $diplomacertificacionegresado
     * @return \Illuminate\Http\Response
     */
    public function show($iddiplomacertificacionegresado)
    {
        $diplomas = \DB::table('DiplomaCertificacionEgresado')
        ->join('DiplomaCertificacion','DiplomaCertificacion.iddiplomadocertificacion','=','DiplomaCertificacionEgresado.diplomacertificacion')
        ->select('DiplomaCertificacionEgresado.dui', 'DiplomaCertificacion.nombre')
        ->where('DiplomaCertificacionEgresado.dui',$iddiplomacertificacionegresado)
        ->get();

        return $diplomas;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\diplomacertificacionegresado  $diplomacertificacionegresado
     * @return \Illuminate\Http\Response
     */
    public function edit(diplomacertificacionegresado $diplomacertificacionegresado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\diplomacertificacionegresado  $diplomacertificacionegresado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, diplomacertificacionegresado $diplomacertificacionegresado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\diplomacertificacionegresado  $diplomacertificacionegresado
     * @return \Illuminate\Http\Response
     */
    public function destroy(diplomacertificacionegresado $diplomacertificacionegresado)
    {
        //
    }
}
