<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

session_start();

class SesionController extends Controller
{

    public function comprobarSesion(){
        if(isset($_SESSION['tipoUsuario'])){
            #echo 'Está loggeado como '. $_SESSION['tipoUsuario'];
            return true;
        }else{
            #echo 'Sesión no iniciada CS';
            return false;
        }
    }

    public function cerrarSesion(){
        session_destroy();
    }

    public function store(Request $request)
    {
        $this->cerrarSesion();
        $logs = new LogsController();
        $logs->store('No ses','No ses');
        return response()->json(['Mensaje'=>'Sesión cerrada'],200);
    }

    public function setTipoUsuario($tipoUsuario){
        $this->cerrarSesion();
        //echo $tipoUsuario;
        if($this->comprobarSesion()){
            return response()->json(['Mensaje'=>'Ya existe una sesión abierta'],200);
        }else{
            $_SESSION['tipoUsuario'] = $tipoUsuario;
        }
    }

    public function getTipoUsuario(){
        if($this->comprobarSesion()){
            return $_SESSION['tipoUsuario'];
        }else{
            return 'Sesión no iniciada';
        }
    }
    //
/*

    // Autorizacion para Administrador
    public function authPlantillaAdmin(){
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
        }else if($sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Egresado
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
    }

    // Autorizacion para Administrador, egresados y otros usuarios
    public function authPlantillaUser(){
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador' || $sesion->getTipoUsuario()=='Egresado'){
            #Acciones de Admin y Egresado
        }else{
            #No loggeado/No se reconoce sesión
            return response()->json(['Mensaje'=>'Sesión no iniciada'],403);
        }
    }
*/
}
