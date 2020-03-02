<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $cargos = Cargo::all();
            return $cargos;
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
            return response()->json(['Mensaje'=>'No autorizado'],401);
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
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
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $cargo = new Cargo;
    
            $cargo->cargo = $request->cargo;
            $cargo->save();
            return response()->json(['Mensaje'=>'Cargo agregado exitosamente'],200);
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
            return response()->json(['Mensaje'=>'No autorizado'],401);
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show($cargo)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $cargos = Cargo::find($cargo);
    
            if(!$cargos){
                return response()->json(['mensaje'=>'Cargo no existe']);
            }else{
                return $cargos;
            }
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
            return response()->json(['Mensaje'=>'No autorizado'],401);
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcargo)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $cargo = Cargo::find($idacargo);
            $cargo->cargo = $request->cargo;
            $cargo->save();
            return response()->json(['Mensaje'=>'Cargo modificado exitosamente'],200);
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
            return response()->json(['Mensaje'=>'No autorizado'],401);
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcargo)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $cargo = Cargo::find($idacargo);
            $cargo->delete();
            return response()->json(['Mensaje'=>'Elemento eliminardo'],200);
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
            return response()->json(['Mensaje'=>'No autorizado'],401);
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        //
    }
}
