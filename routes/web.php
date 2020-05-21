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
})->name('index');

Route::get('/pasajero', function () {
    return view('pasajero.master');
});

Route::get('/conductor', function () {
    return view('conductor.master');
});

Route::get('/administrador', function () {
    return view('administrador.master');
});

Route::get ('/conductor/pasajeros', 'ConductorController@pasajeros');
Route::post('/conductor/pasajeros', 'ConductorController@pasajeros');

Route::get ('/conductor/mishorarios',        'ConductorController@misHorarios');
Route::post('/conductor/mishorarios',        'ConductorController@misHorarios');
Route::get ('/conductor/mishorarios/borrar', 'ConductorController@borrarHorario');
Route::post('/conductor/mishorarios/borrar', 'ConductorController@borrarHorario');

Route::get ('/conductor/mishorarios/crear', 'ConductorController@nuevoHorario');
Route::post('/conductor/mishorarios/crear', 'ConductorController@nuevoHorario_crear');

Route::get ('/conductor/coches',           'ConductorController@coches');
Route::get ('/conductor/coches/crear',     'ConductorController@coches_crear');
Route::post('/conductor/coches/crear',     'ConductorController@coches_creado');
Route::get ('/conductor/coches/modificar', 'ConductorController@coches_modificar');
Route::post('/conductor/coches/modificar', 'ConductorController@coches_modificado');
Route::get ('/conductor/coches/borrar',    'ConductorController@coches_borrar');

Route::get ('/conductor/configurar-perfil',           'ConductorController@confperfil');
Route::post ('/conductor/configurar-perfil/borrar',    'ConductorController@perfil_borrar');
Route::get ('/conductor/configurar-perfil/modificar', 'ConductorController@perfil_modificar');
Route::post('/conductor/configurar-perfil/modificar', 'ConductorController@perfil_modificado');

Route::get('/conductor/ruta', 'ConductorController@ruta');
Route::get('/conductor/ruta/modificar', 'ConductorController@ruta_modificar');
Route::post('/conductor/ruta/modificar', 'ConductorController@ruta_modificada');

Route::get ('/pasajero/misreservas', 'PasajeroController@misReservas');
Route::post('/pasajero/misreservas', 'PasajeroController@misReservas');
Route::post ('/pasajero/eliminarReserva', 'PasajeroController@eliminarReserva');

Route::get ('/pasajero/configurarperfil',            'PasajeroController@confperfil');
Route::post ('/pasajero/configurar-perfil/borrar',    'PasajeroController@perfil_borrar');
Route::get ('/pasajero/configurar-perfil/modificar', 'PasajeroController@perfil_modificar');
Route::post('/pasajero/configurar-perfil/modificar', 'PasajeroController@perfil_modificado');
Route::get ('/pasajero/buscarViajes',                'PasajeroController@buscarViajes');
Route::post ('/pasajero/buscarViajes',               'PasajeroController@buscarViajes');
Route::post ('/pasajero/buscarViajes/reservarViaje',  'PasajeroController@reservarViaje');
Route::get ('/pasajero/buscarViajes/reservarViaje',  'PasajeroController@reservarViaje');


Route::get('/administrador/pasajeros', 'AdministradorController@pasajeros');
Route::post('/administrador/pasajeros', 'AdministradorController@pasajeros');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
