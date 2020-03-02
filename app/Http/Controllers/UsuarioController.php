<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Persona;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        #$usuario=Usuario::all();
        #return $usuario;
        return response()->json(['Mensaje'=>'Registro de usuarios'],200);
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
            $usuario = new Usuario;
            $persona = new Persona;
    
            $persona->dui = $request->dui;
            $persona->nit = $request->nit;
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->telefono = $request->telefono;
            $persona->direccion = $request->direccion;
            $persona->correo = $request->correo;
            $persona->fechanacimiento = $request->fechanacimiento;
            $persona->sexo = $request->sexo;
            $persona->foto = $request->foto;
            $persona->save();
    
            $usuario->dui = $request->dui;
            $usuario->usuario = $request->usuario;
            $usuario->contrasena = $request->contrasena;
            $usuario->tipousuario = 2;
            $usuario->save();
            return response()->json(['Mensaje'=>'Nuevo Usuario: '.$request->usuario.' registrado'],200);
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
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($idusuario)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $usuario = Usuario::find($idusuario);
            return $usuario;
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
    public function update(Request $request, $idusuario)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $usuario = Usuario::find($idusuario);
            $persona = Persona::find($idusuario);
    
            $persona->dui = $request->dui;
            $persona->nit = $request->nit;
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->telefono = $request->telefono;
            $persona->direccion = $request->direccion;
            $persona->correo = $request->correo;
            $persona->fechanacimiento = $request->fechanacimiento;
            $persona->sexo = $request->sexo;
            $persona->foto = $request->foto;
            $persona->save();
    
            $usuario->dui = $request->dui;
            $usuario->usuario = $request->usuario;
            $usuario->contrasena = $request->contrasena;
            $usuario->tipoUsuario = $request->tipousuario;
            $usuario->save();
            return response()->json(['Mensaje'=>'Usuario: '.$request->usuario.' modificado'],200);
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
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($idusuario)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $usuario = Usuario::find($idusuario);
            $usuario->delete();
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
