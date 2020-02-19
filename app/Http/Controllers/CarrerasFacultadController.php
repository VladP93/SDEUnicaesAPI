<?php

namespace App\Http\Controllers;

use App\CarreraFacultad;
use App\Carrera;
use App\Facultad;
use Illuminate\Http\Request;

class CarrerasFacultadController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carrerasFacultad = \DB::table('CarreraFacultad')
        ->join('Carrera','CarreraFacultad.idcarrera','=','Carrera.idcarrera')
        ->join('Facultad','CarreraFacultad.idfacultad','=','Facultad.idfacultad')
        ->join('TipoCarrera','Carrera.tipocarrera','=','TipoCarrera.idtipocarrera')
        ->select('Carrera.carrera','Facultad.facultad','TipoCarrera.tipocarrera')
        ->get();
        return $carrerasFacultad;
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
        $carreraFacultad = new CarreraFacultad;
        $carrera = new Carrera;

        $carrera->carrera = $request->carrera;
        $carrera->tipocarrera = $request->tipocarrera;
        $carrera->save();
        $carreraFacultad->idcarrera = \DB::table('Carrera')->latest('idcarrera')->first()->idcarrera;
        $carreraFacultad->idfacultad = $request->idfacultad;
        $carreraFacultad->save();

        return response()->json(['Mensaje'=>'Carrera agregada exitosamente'],200);
        //
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarreraFacultad  $carreraFacultad
     * @return \Illuminate\Http\Response
     */
    public function show($carrera)
    {

        $carreras = \DB::table('Carrera')
        ->where('Carrera.idcarrera',$carrera)
        ->join('CarreraFacultad','CarreraFacultad.idcarrera','=','Carrera.idcarrera')
        ->join('Facultad','CarreraFacultad.idfacultad','=','Facultad.idfacultad')
        ->select('Carrera.carrera','Facultad.facultad')
        ->get();

        if(!$carreras){
            return response()->json(['mensaje'=>'Carrera inexistente']);
        }else{
            return $carreras;
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarreraFacultad  $carreraFacultad
     * @return \Illuminate\Http\Response
     */
    public function edit(CarreraFacultad $carreraFacultad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarreraFacultad  $carreraFacultad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcarrera)
    {
        $carrera = Carrera::find($idcarrera);
        $carrera->carrera = $request->carrera;
        $carrera->save();
        return response()->json(['Mensaje'=>'Carrera modificada exitosamente'],200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarreraFacultad  $carreraFacultad
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcarrera)
    {
        $carrera = Carrera::find($idcarrera);
        $carrera->delete();
        return response()->json(['Mensaje'=>'Elemento eliminardo'],200);
        //
    }
}
