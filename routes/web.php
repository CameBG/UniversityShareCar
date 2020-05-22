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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
});

Route::get('/sobreProyecto', function () {
    return view('sobreProyecto');
})->name('sobreProyecto');

Route::get('/contactanos', function () {
    return view('contactanos');
})->name('contactanos');

Route::get ('/pasajero/buscarViajes', 'PasajeroController@buscarViajes');
Route::post ('/pasajero/buscarViajes',               'PasajeroController@buscarViajes');

Route::group(['middleware' => ['auth']], function () { 
    /*Route::get('/index', function () {
        $user = Auth::user();
        return view('index', compact(['user']));
    })->name('index');*/

    Route::get('/pasajero', function () {
        return view('pasajero.master');
    });

    Route::get('/conductor', function () {
        return view('conductor.master');
    });

    Route::get('/administrador', function () {
        return view('administrador.master');
    });

    Route::get('/index', 'HomeController@elegir');
    Route::post('index/crearConductor', 'HomeController@nuevoConductor_crear');
    Route::post('index/crearPasajero', 'HomeController@nuevoPasajero_crear');

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

    Route::get ('/conductor/confperfil',           'ConductorController@confperfil');
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
    Route::post ('/pasajero/buscarViajes/reservarViaje',  'PasajeroController@reservarViaje');
    Route::get ('/pasajero/buscarViajes/reservarViaje',  'PasajeroController@reservarViaje');


    Route::get('/administrador/pasajeros', 'AdministradorController@pasajeros');
    Route::post('/administrador/pasajeros', 'AdministradorController@pasajeros');
    Route::get ('/administrador/pasajeros/borrar', 'AdministradorController@borrarPasajero');
    Route::post('/administrador/pasajeros/borrar', 'AdministradorController@borrarPasajero');
    Route::get ('/administrador/pasajeros/crear', 'AdministradorController@nuevoPasajero');
    Route::post('/administrador/pasajeros/crear', 'AdministradorController@nuevoPasajero_crear');
    Route::get ('/administrador/pasajeros/modificar', 'AdministradorController@pasajero_modificar');
    Route::post('/administrador/pasajeros/modificar', 'AdministradorController@pasajero_modificado');
    Route::get('/administrador/pasajero', 'AdministradorController@pasajero_ver');
    Route::post('/administrador/pasajero', 'AdministradorController@pasajero_ver');


    Route::get('/administrador/conductores', 'AdministradorController@conductores');
    Route::post('/administrador/conductores', 'AdministradorController@conductores');
    Route::get ('/administrador/conductores/borrar', 'AdministradorController@borrarConductor');
    Route::post('/administrador/conductores/borrar', 'AdministradorController@borrarConductor');
    Route::get ('/administrador/conductores/crear', 'AdministradorController@nuevoConductor');
    Route::post('/administrador/conductores/crear', 'AdministradorController@nuevoConductor_crear');
    Route::get ('/administrador/conductores/modificar', 'AdministradorController@conductor_modificar');
    Route::post('/administrador/conductores/modificar', 'AdministradorController@conductor_modificado');
    Route::get('/administrador/conductor', 'AdministradorController@conductor_ver');
    Route::post('/administrador/conductor', 'AdministradorController@conductor_ver');

    Route::get('/administrador/users', 'AdministradorController@users');
    Route::post('/administrador/users', 'AdministradorController@users');
    Route::get ('/administrador/users/borrar', 'AdministradorController@borrarUser');
    Route::post('/administrador/users/borrar', 'AdministradorController@borrarUser');

    Route::get('/administrador/rutas', 'AdministradorController@rutas');
    Route::post('/administrador/rutas', 'AdministradorController@rutas');
    Route::get ('/administrador/rutas/crear', 'AdministradorController@nuevaRuta');
    Route::post('/administrador/rutas/crear', 'AdministradorController@nuevaRuta_crear');

    Route::get('/administrador/slots', 'AdministradorController@slots');
    Route::post('/administrador/slots', 'AdministradorController@slots');
    Route::get ('/administrador/slots/borrar', 'AdministradorController@borrarSlot');
    Route::post('/administrador/slots/borrar', 'AdministradorController@borrarSlot');
});
