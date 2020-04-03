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
    return view('conductor.master');
});

Route::get('/pasajeros', 'ConductorController@pasajeros');
Route::post('/pasajeros', 'ConductorController@pasajeros');

Route::get('/mishorarios', 'ConductorController@misHorarios');
Route::post('/mishorarios', 'ConductorController@misHorarios');

Route::get('/nuevohorario', 'ConductorController@nuevoHorario');
Route::post('/nuevohorario', 'ConductorController@nuevoHorario_crear');
