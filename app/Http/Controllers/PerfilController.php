<?php

namespace App\Http\Controllers;

use App\Egresado;
use App\Aptitud;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $egresado = \DB::table('Egresado')
        ->join('Persona','Egresado.dui','=','Persona.dui')
        //->join('CarreraEgresado','Egresado.dui','=','CarreraEgresado.dui')
        //->join('Carrera','CarreraEgresado.idcarrera','=','Carrera.idcarrera')
        //->join('DiplomaCertificacionEgresado','Egresado.dui','=','DiplomaCertificacionEgresado.dui')
        //->join('DiplomaCertificacion','DiplomaCertificacionEgresado.diplomacertificacion','=','DiplomaCertificacion.iddiplomadocertificacion')
        //->join('AptitudEgresado','Egresado.dui','=','AptitudEgresado.dui')
        //->join('Aptitud','AptitudEgresado.idaptitud','=','Aptitud.idaptitud')
        //->join('ExperienciaLaboral','Egresado.dui','=','ExperienciaLaboral.egresado')
        //->join('Institucion','ExperienciaLaboral.institucion','=','Institucion.idinstitucion')
        //->join('Cargo','ExperienciaLaboral.cargo','=','Cargo.idcargo')
        //->join('AreaLaboral','ExperienciaLaboral.arealaboral','=','AreaLaboral.idarea')
        ->select('Persona.dui','Persona.nombre as nombrePersona','Persona.apellido','Persona.correo','Persona.telefono',
        'Carrera.carrera','DiplomaCertificacion.nombre','Aptitud.aptitud','Institucion.nombre',
        'Cargo.cargo','ExperienciaLaboral.fechainicio','ExperienciaLaboral.fechafin','AreaLaboral.area')
#        -with('Aptitud');
        ->select('Persona.dui','Persona.nombre as nombrePersona','Persona.apellido','Persona.correo','Persona.telefono')
        ->get();

        return $egresado;

    }

#    public function getAptitudes($dui){
#        $aptitudes = \DB::table('Aptitud')
#        ->join('AptitudEgresado','Aptitud.idaptitud','=','AptitudEgresado.idaptitud')
#        ->join('Egresado','Egresado.dui','=','AptitudEgresado.dui')
#        ->where('Egresado.dui','=',$dui)
#        ->select('aptitud')
#        ->get();
#    }

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
    public function show($egresado)
    {
        $egresado = \DB::table('Egresado')
        ->join('Persona','Egresado.dui','=','Persona.dui')
        //->join('CarreraEgresado','Egresado.dui','=','CarreraEgresado.dui')
        //->join('Carrera','CarreraEgresado.idcarrera','=','Carrera.idcarrera')
        //->join('DiplomaCertificacionEgresado','Egresado.dui','=','DiplomaCertificacionEgresado.dui')
        //->join('DiplomaCertificacion','DiplomaCertificacionEgresado.diplomacertificacion','=','DiplomaCertificacion.iddiplomadocertificacion')
        //->join('AptitudEgresado','Egresado.dui','=','AptitudEgresado.dui')
        //->join('Aptitud','AptitudEgresado.idaptitud','=','Aptitud.idaptitud')
        //->join('ExperienciaLaboral','Egresado.dui','=','ExperienciaLaboral.egresado')
        //->join('Institucion','ExperienciaLaboral.institucion','=','Institucion.idinstitucion')
        //->join('Cargo','ExperienciaLaboral.cargo','=','Cargo.idcargo')
        //->join('AreaLaboral','ExperienciaLaboral.arealaboral','=','AreaLaboral.idarea')
        //->select('Persona.dui','Persona.nombre as nombrePersona','Persona.apellido','Persona.correo','Persona.telefono',
        //'Carrera.carrera','DiplomaCertificacion.nombre','Aptitud.aptitud','Institucion.nombre',
        //'Cargo.cargo','ExperienciaLaboral.fechainicio','ExperienciaLaboral.fechafin','AreaLaboral.area')
        ->select('Persona.dui','Persona.nombre as nombrePersona','Persona.apellido','Persona.correo','Persona.telefono')
        ->where('Egresado.dui',$egresado)
        ->get();

        return $egresado;
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
