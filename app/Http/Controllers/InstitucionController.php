<?php

namespace App\Http\Controllers;

use App\Institucion;
use App\Ubicacion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
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
            #Acciones de Admin
            $instituciones = \DB::table('Institucion')
            ->join('Ubicacion','Institucion.ubicacion','=','Ubicacion.idubicacion')
            ->join('Municipio','Ubicacion.idmunicipio','=','Municipio.idmunicipio')
            ->join('Departamento','Municipio.iddepartamento','=','Departamento.iddepartamento')
            ->select('idinstitucion','Institucion.nombre','Ubicacion.direccion','Departamento.departamento','Municipio.municipio')
            ->get();
            return $instituciones;
        }else{
            #No loggeado/No se reconoce sesión
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
            #Acciones de Admin
            $institucion = new Institucion;
            $ubicacion = new Ubicacion;
    
            $ubicacion->direccion = $request->direccion;
            $ubicacion->idmunicipio = $request->idmunicipio;
            $ubicacion->save();
            $institucion->nombre = $request->nombre;
            $institucion->ubicacion = \DB::table('Ubicacion')->latest('idubicacion')->first()->idubicacion;
            $institucion->telefono = $request->telefono;
            $institucion->save();
            return response()->json(['Mensaje'=>'Institución agregada exitosamente'],200);
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
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show($institucion)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $instituciones = \DB::table('Institucion')
            ->join('Ubicacion','Institucion.ubicacion','=','Ubicacion.idubicacion')
            ->join('Municipio','Ubicacion.idmunicipio','=','Municipio.idmunicipio')
            ->join('Departamento','Municipio.iddepartamento','=','Departamento.iddepartamento')
            ->select('idinstitucion','Institucion.nombre','Ubicacion.direccion','Departamento.departamento','Municipio.municipio')
            ->where('Institucion.idinstitucion',$institucion)
            ->get();
            return $instituciones;
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
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Institucion $institucion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idinstitucion)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $institucion = Institucion::find($idinstitucion);
            $institucion->nombre = $request->nombre;
            $institucion->save();
            return response()->json(['Mensaje'=>'Institucion modificada exitosamente'],200);
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
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy($idinstitucion)
    {
        $logs = new LogsController();
        $sesion = new SesionController();
        $sesion->setTipoUsuario($logs->getLogInfo());
        if($sesion->getTipoUsuario()=='Administrador'){
            #Acciones de Admin
            $institucion = Institucion::find($idinstitucion);
            $institucion->delete();
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
