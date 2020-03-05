<?php

namespace App\Http\Controllers;

use App\DiplomaCertificacion;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplomas = DiplomaCertificacion::all();
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
     * @param  \App\DiplomaCertificacion  $diplomaCertificacion
     * @return \Illuminate\Http\Response
     */
    public function show(DiplomaCertificacion $diplomaCertificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiplomaCertificacion  $diplomaCertificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(DiplomaCertificacion $diplomaCertificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiplomaCertificacion  $diplomaCertificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiplomaCertificacion $diplomaCertificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiplomaCertificacion  $diplomaCertificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiplomaCertificacion $diplomaCertificacion)
    {
        //
    }
}
