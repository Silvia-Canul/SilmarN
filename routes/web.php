<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login.login');
});
Route::get('logout','AccesoController@salir');
Route::post('validar','AccesoController@validar');

////////////////////VISTAS//////////////////////

Route::get('capilla', function(){
	return view('capilla.capilla');
});

Route::get('personal',function(){
	return view('personal.personal');
});
Route::get('servicio',function(){
	return view('servicio.servicio');
});


////////////////APIS///////////////////////////////

Route::apiResource('apiCap','ApiCapillaController');
Route::apiResource('apiPer','ApiPersonalController');
Route::apiResource('apiRol','ApiRolController');
Route::apiResource('apiSer','ApiServicioController');  