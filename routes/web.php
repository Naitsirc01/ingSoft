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

Route::get('/registroCon', function () {
    return view('registroconvenio');
});

Route::get('/extension', function () {
    return view('extension');
});
Route::get('/extension2', function () {
    return view('extension2');
});
Route::get('/registroExt', function () {
    return view('extension');
});

Route::get('my-home', 'HomeController@myHome');
Route::get('my-users', 'HomeController@myUsers');
