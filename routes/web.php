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

Route::get('/coches', 'ConductorController@coches');
Route::get('/coches/borrar', 'ConductorController@coches_borrar');
Route::get('/coches/crear', 'ConductorController@coches_crear');
Route::post('/coches/crear', 'ConductorController@coches_creado');
Route::get('/coches/modificar', 'ConductorController@coches_modificar');
Route::post('/coches/modificar', 'ConductorController@coches_modificado');

Route::get('/mishorarios', 'MisHorariosController@showHorarios');
Route::post('/mishorarios', 'MisHorariosController@showHorarios');