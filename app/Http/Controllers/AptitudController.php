<?php

namespace App\Http\Controllers;

use App\Aptitud;
use Illuminate\Http\Request;

class AptitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aptitudes = Aptitud::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aptitud  $aptitud
     * @return \Illuminate\Http\Response
     */
    public function show(Aptitud $aptitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aptitud  $aptitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Aptitud $aptitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aptitud  $aptitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aptitud $aptitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aptitud  $aptitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aptitud $aptitud)
    {
        //
    }
}
