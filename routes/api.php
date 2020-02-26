<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas de la API
Route::resource('/usuarios','UsuarioController');
Route::resource('/departamentos', 'DepartamentoController');
Route::resource('/facultades','FacultadController');
Route::resource('/ubicaciones','UbicacionController');
Route::resource('/aptitudes','AptitudController');
Route::resource('/areaslaborales','AreaLaboralController');
Route::resource('/cargos','CargoController');
Route::resource('/carreras','CarrerasFacultadController');
Route::resource('/decanos','DecanoController');
Route::resource('/instituciones','InstitucionController');
Route::resource('/tiposcarrera','TipoCarreraController');
Route::resource('/perfil','PerfilController');
Route::resource('/municipiosdep','DepartamentoMunicipioController');
Route::resource('/carrerasegresado','CarreraEgresadoController');
Route::resource('/diplomasegresado','DiplomaEgresadoController');
Route::resource('/aptitudesegresado','AptitudEgresadoController');
Route::resource('/experiencialaboral','ExperienciaLaboralController');
Route::resource('/login','LogInController');