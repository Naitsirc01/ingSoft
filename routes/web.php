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
    return view('welcome');
});

Route::get('/menu', function () {
    return view('menu');
});


/*
Route::get('/registroas', function () {
    return view('registroAyS');
});

Route::get('/registroExtension', function () {
    return view('registroextension');
});

Route::get('/registroTit', function () {
    return view('registroTitulacion');
});
Route::get('/registrotitulados', function(){
    return view('registrotitulados');
});

Route::get('my-home', 'HomeController@myHome');
Route::get('my-users', 'HomeController@myUsers');

Route::post('actividad_extension', 'ActividadExtensionController@store');
Route::post('actividad_convenio', 'ActividadConvenioController@store');
Route::post('actividad_aprendizaje_servicio','ActividadAprendizajeServicioController@store');

///Esto para no asignar a cada una de las rutas

*/
Route::resource('/act_regitro_extension', 'ActRegistroExtensionesController');

Route::resource('/act_titulacion_con', 'ActTitulacionConvenioController');

Route::resource('/regitro_titulados', 'RegistroTituladosController');

Route::resource('/act_aprendizaje_servicio', 'ActAprendizajeServicioController');

Route::resource('/act_registro_convenio', 'ActRegistroConvenioController');


