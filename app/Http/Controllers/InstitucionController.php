<?php

namespace App\Http\Controllers;

use App\Institucion;
use App\Ubicacion;
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
        $institucion = new Institucion;
        $ubicacion = new Ubicacion;

        $ubicacion->direccion = $request->direccion;
        $ubicacion->idmunicipio = $request->idmunicipio;
        $ubicacion->save();
        $institucion->nombre = $request->nombre;
        $institucion->ubicacion = \DB::table('Ubicacion')->latest('idubicacion')->first()->idubicacion;
        $institucion->telefono = $request->telefono;
        $institucion->save();
        return response()->json(['Mensaje'=>'Institución agregada exitosamente'],200);
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
    public function update(Request $request, $idinstitucion)
    {
        $institucion = Institucion::find($idinstitucion);
        $institucion->nombre = $request->nombre;
        $institucion->save();
        return response()->json(['Mensaje'=>'Institucion modificada exitosamente'],200);
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
