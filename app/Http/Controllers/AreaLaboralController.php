<?php

namespace App\Http\Controllers;

use App\AreaLaboral;
use Illuminate\Http\Request;

class AreaLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areaslaborales = AreaLaboral::all();
        return $areaslaborales;
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
        $areaLaboral = new AreaLaboral;

        $areaLaboral->area = $request->area;
        $areaLaboral->save();

        return response()->json(['Mensaje'=>'Area laboral agregada exitosamente'],200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AreaLaboral  $areaLaboral
     * @return \Illuminate\Http\Response
     */
    public function show($areaLaboral)
    {
        $areaslaborales = AreaLaboral::find($areaLaboral);

        if(!$areaslaborales){
            return response()->json(['mensaje'=>'Area laboral no existe']);
        }else{
            return $areaslaborales;
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AreaLaboral  $areaLaboral
     * @return \Illuminate\Http\Response
     */
    public function edit(AreaLaboral $areaLaboral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AreaLaboral  $areaLaboral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idareaLaboral)
    {
        $areaLaboral = AreaLaboral::find($idareaLaboral);
        $areaLaboral->area = $request->area;
        $areaLaboral->save();
        return response()->json(['Mensaje'=>'Area Laboral modificada exitosamente'],200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AreaLaboral  $areaLaboral
     * @return \Illuminate\Http\Response
     */
    public function destroy($idareaLaboral)
    {
        $areaLaboral = AreaLaboral::find($idareaLaboral);
        $areaLaboral->delete();
        return response()->json(['Mensaje'=>'Elemento eliminardo'],200);
        //
    }
}
