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
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $tiposcarrera = TipoCarrera::all();
            return $tiposcarrera;
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
            return response()->json(['Mensaje'=>'Usuario no autorizado'],401);
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
            $tipoCarrera = new TipoCarrera;
    
            $tipoCarrera->tipocarrera = $request->tipocarrera;
            $tipoCarrera->save();
    
            return response()->json(['Mensaje'=>'Tipo de carrera agregado exitosamente'],200);
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
            return response()->json(['Mensaje'=>'Usuario no autorizado'],401);
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoCarrera  $tipoCarrera
     * @return \Illuminate\Http\Response
     */
    public function show($tipoCarrera)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $tiposcarrera = TipoCarrera::find($tipoCarrera);
            if(!$tiposcarrera){
                return response()->json(['mensaje'=>'Tipo de carrera no definido']);
            }else{
                return $tiposcarrera;
            }
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
            return response()->json(['Mensaje'=>'Usuario no autorizado'],401);
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
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
    public function update(Request $request, $idtipoCarrera)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $tipoCarrera = TipoCarrera::find($idtipocarrera);
            $tipoCarrera->tipocarrera = $request->tipocarrera;
            $tipoCarrera->save();
            return response()->json(['Mensaje'=>'El tipo de la carrera ha sido modificado exitosamente'],200);
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
            return response()->json(['Mensaje'=>'Usuario no autorizado'],401);
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoCarrera  $tipoCarrera
     * @return \Illuminate\Http\Response
     */
    public function destroy($idtipoCarrera)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $tipoCarrera = TipoCarrera::find($idtipoCarrera);
            $tipoCarrera->delete();
            return response()->json(['Mensaje'=>'Elemento eliminardo'],200);
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
            return response()->json(['Mensaje'=>'Usuario no autorizado'],401);
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        //
    }
}
