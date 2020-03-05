<?php

namespace App\Http\Controllers;

use App\ExperienciaLaboral;
use Illuminate\Http\Request;

class ExperienciaLaboralController extends Controller
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


        $experiencia = \DB::table('ExperienciaLaboral')
        ->join('Institucion','Institucion.idinstitucion','=','ExperienciaLaboral.institucion')
        ->join('Cargo','ExperienciaLaboral.cargo','=','Cargo.idcargo')
        ->join('AreaLaboral','AreaLaboral.idArea','=','ExperienciaLaboral.arealaboral')
        ->select('Institucion.nombre','Cargo.cargo','ExperienciaLaboral.fechainicio','ExperienciaLaboral.fechafin','AreaLaboral.area')
        ->where('ExperienciaLaboral.egresado',$dui)
        ->get();
        

        return $experiencia;
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
        $experiencialaboral = new ExperienciaLaboral;

        $log = new LogsController();
        $dui = $log->getLogUser();

        $experiencialaboral->institucion = $request->institucion;
        $experiencialaboral->cargo = $request->cargo;
        $experiencialaboral->arealaboral = $request->arealaboral;
        $experiencialaboral->fechainicio = $request->fechainicio;
        $experiencialaboral->fechafin = $request->fechafin;
        $experiencialaboral->egresado = $dui;
        $experiencialaboral->save();
        return response()->json(['Mensaje'=>'Experiencia laboral agregada exitosamente'],200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\experiencialaboral  $experiencialaboral
     * @return \Illuminate\Http\Response
     */
    public function show($idexperiencialaboral)
    {
        $experiencia = \DB::table('ExperienciaLaboral')
        ->join('Institucion','Institucion.idinstitucion','=','ExperienciaLaboral.institucion')
        ->join('Cargo','ExperienciaLaboral.cargo','=','Cargo.idcargo')
        ->join('AreaLaboral','AreaLaboral.idArea','=','ExperienciaLaboral.arealaboral')
        ->select('Institucion.nombre','Cargo.cargo','ExperienciaLaboral.fechainicio','ExperienciaLaboral.fechafin','AreaLaboral.area')
        ->where('ExperienciaLaboral.egresado',$idexperiencialaboral)
        ->get();
        

        return $experiencia;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\experiencialaboral  $experiencialaboral
     * @return \Illuminate\Http\Response
     */
    public function edit(experiencialaboral $experiencialaboral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\experiencialaboral  $experiencialaboral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, experiencialaboral $experiencialaboral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\experiencialaboral  $experiencialaboral
     * @return \Illuminate\Http\Response
     */
    public function destroy(experiencialaboral $experiencialaboral)
    {
        //
    }
}
