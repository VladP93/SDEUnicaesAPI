<?php

namespace App\Http\Controllers;

use App\Aptitud;
use App\Http\Controllers\SesionController;
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
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador' || $sesion->getTipoUsuario()=='Egresado'){
            $aptitudes = Aptitud::all();
            return $aptitudes;
        }else{
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        
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
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            $aptitud = new Aptitud;

            $aptitud->aptitud = $request->aptitud;
            $aptitud->save();
            return response()->json(['Mensaje'=>'Aptitud agregada exitosamente'],200);
        }else if($sesion->getTipoUsuario()=='Egresado'){
            return response()->json(['Mensaje'=>'No autorizado'],401);
        }else{
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aptitud  $aptitud
     * @return \Illuminate\Http\Response
     */
    public function show($aptitud)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            $aptitudes = Aptitud::find($aptitud);

            if(!$aptitudes){
                return response()->json(['mensaje'=>'Aptitud inexistente'],200);
            }else{
                return $aptitudes;
            }
        }else if($sesion->getTipoUsuario()=='Egresado'){
            return response()->json(['Mensaje'=>'No autorizado'],401);
        }else{
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        
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
    public function update(Request $request,$idaptitud)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            $aptitud = Aptitud::find($idaptitud);
            $aptitud->aptitud = $request->aptitud;
            $aptitud->save();
            return response()->json(['Mensaje'=>'Aptitud modificada exitosamente'],200);
        }else if($sesion->getTipoUsuario()=='Egresado'){
            return response()->json(['Mensaje'=>'No autorizado'],401);
        }else{
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aptitud  $aptitud
     * @return \Illuminate\Http\Response
     */
    public function destroy($idaptitud)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            $aptitud = Aptitud::find($idaptitud);
            $aptitud->delete();
            return response()->json(['Mensaje'=>'Elemento eliminardo'],200);
        }else if($sesion->getTipoUsuario()=='Egresado'){
            return response()->json(['Mensaje'=>'No autorizado'],401);
        }else{
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
        
        //
    }
}
