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
    return view('index');
});

Route::get('/pasajero', function () {
    return view('pasajero.master');
});

Route::get('/conductor', function () {
    return view('conductor.master');
});

Route::get ('/conductor/pasajeros', 'ConductorController@pasajeros');
Route::post('/conductor/pasajeros', 'ConductorController@pasajeros');

Route::get ('/conductor/mishorarios',        'ConductorController@misHorarios');
Route::post('/conductor/mishorarios',        'ConductorController@misHorarios');
Route::get ('/conductor/mishorarios/borrar', 'ConductorController@borrarHorario');
Route::post('/conductor/mishorarios/borrar', 'ConductorController@borrarHorario');

Route::get ('/conductor/mishorarios/crear', 'ConductorController@nuevoHorario');
Route::post('/conductor/mishorarios/crear', 'ConductorController@nuevoHorario_crear');

Route::get ('/coches',           'ConductorController@coches');
Route::get ('/coches/crear',     'ConductorController@coches_crear');
Route::post('/coches/crear',     'ConductorController@coches_creado');
Route::get ('/coches/modificar', 'ConductorController@coches_modificar');
Route::post('/coches/modificar', 'ConductorController@coches_modificado');
Route::get ('/coches/borrar',    'ConductorController@coches_borrar');

Route::get ('/pasajero/misreservas', 'PasajeroController@misReservas');
Route::post('/pasajero/misreservas', 'PasajeroController@misReservas');

Route::get ('/pasajero/configurarperfil', 'PasajeroController@confperfil');
