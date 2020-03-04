<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class LogInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesion = new SesionController();
        $sesion->cerrarSesion();
        return response()->json(['Mensaje'=>'Esperando credenciales'],200);
        
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
        $sesion = new SesionController();
        $logs = new LogsController();
        $usuario = Usuario::where('usuario',$request->usuario)
        ->where('contrasena',$request->contrasena)
        ->join('TipoUsuario','tipoUsuario.idtipousuario','=','Usuario.tipoUsuario')
        ->select('dui','usuario','contrasena','tipousuario.tipousuario')
        ->first();
        $tipoUsuario = '';
        
        if(!empty($usuario)){
            $tipoUsuario = $usuario['tipousuario'];
            $sesion->setTipoUsuario($tipoUsuario);
            $logs->store($tipoUsuario,$usuario['dui']);
            return response()->json(['Mensaje'=>'Conectado como '. $tipoUsuario],200);
            #return response()->json([true],200);
        }else{
            
            $logs->store('No ses','No ses');
            return response()->json([false],401);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($idusuario)
    {
        //$usuario = Usuario::where('usuario',$idusuario)
        //#->where('contrasena','passa')
        //->first();
//
        //if(!empty($usuario)){
        //    return response()->json([true],200);
        //}else{
        //    return response()->json([],204);
        //}
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
