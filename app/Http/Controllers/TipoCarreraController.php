<?php

namespace App\Http\Controllers;

use App\TipoCarrera;
use Illuminate\Http\Request;

class TipoCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tiposcarrera = TipoCarrera::all();
        return $tiposcarrera;
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
     * @param  \App\TipoCarrera  $tipoCarrera
     * @return \Illuminate\Http\Response
     */
    public function show(TipoCarrera $tipoCarrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoCarrera  $tipoCarrera
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoCarrera $tipoCarrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoCarrera  $tipoCarrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoCarrera $tipoCarrera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoCarrera  $tipoCarrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCarrera $tipoCarrera)
    {
        //
    }
}
