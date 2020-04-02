<?php

use Illuminate\Database\Seeder;
use App\Pasajero;

class PasajerosTableSeeder extends Seeder
{
    public function run()
    {
        Pasajero::query()->delete();
        
        Pasajero::create(['correo' => 'came@dss.com',      'nombre' => 'Came',      'fechaNacimiento' => '1990-01-20', 'genero' => 'Mujer' , 'rutaImagen' => 'ruta/imagen00.png', 'telefono' => '666666666']);
        Pasajero::create(['correo' => 'edgar@dss.com',     'nombre' => 'Edgar',     'fechaNacimiento' => '1990-01-20', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen01.png']);
        Pasajero::create(['correo' => 'sandra@dss.com',    'nombre' => 'Sandra',    'fechaNacimiento' => '1990-01-23', 'genero' => 'Mujer' , 'rutaImagen' => 'ruta/imagen02.png']);
        Pasajero::create(['correo' => 'tudor@dss.com',     'nombre' => 'Tudor',     'fechaNacimiento' => '1990-01-21', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen03.png']);
        Pasajero::create(['correo' => 'estefania@dss.com', 'nombre' => 'Estefania', 'fechaNacimiento' => '1990-01-03', 'genero' => 'Mujer' , 'rutaImagen' => 'ruta/imagen04.png']);
        Pasajero::create(['correo' => 'paco@dss.com',      'nombre' => 'Paco',      'fechaNacimiento' => '1990-01-01', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen05.png']);
        Pasajero::create(['correo' => 'jose@dss.com',      'nombre' => 'Jose',      'fechaNacimiento' => '1990-01-18', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen06.png']);
        Pasajero::create(['correo' => 'javi@dss.com',      'nombre' => 'Javi',      'fechaNacimiento' => '1990-01-19', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen07.png']);
        Pasajero::create(['correo' => 'fran@dss.com',      'nombre' => 'Fran',      'fechaNacimiento' => '1990-01-18', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen08.png']);
        Pasajero::create(['correo' => 'sofia@dss.com',     'nombre' => 'Sofia',     'fechaNacimiento' => '1990-01-21', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen09.png']);
        Pasajero::create(['correo' => 'felipe@dss.com',    'nombre' => 'Felipe',    'fechaNacimiento' => '1990-01-22', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen10.png']);
        Pasajero::create(['correo' => 'daniel@dss.com',    'nombre' => 'Daniel',    'fechaNacimiento' => '1990-01-21', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen11.png']);
        Pasajero::create(['correo' => 'alejandro@dss.com', 'nombre' => 'Alejandro', 'fechaNacimiento' => '1990-01-22', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen12.png']);
        Pasajero::create(['correo' => 'roberto@dss.com',   'nombre' => 'Roberto',   'fechaNacimiento' => '1990-01-23', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen13.png']);
        Pasajero::create(['correo' => 'fernando@dss.com',  'nombre' => 'Fernando',  'fechaNacimiento' => '1990-01-26', 'genero' => 'Hombre', 'rutaImagen' => 'ruta/imagen14.png']);
        Pasajero::create(['correo' => 'andrea@dss.com',    'nombre' => 'Andrea',    'fechaNacimiento' => '1990-01-17']);
        Pasajero::create(['correo' => 'alejandra@dss.com', 'nombre' => 'Alejandra', 'fechaNacimiento' => '1990-01-18']);
        Pasajero::create(['correo' => 'maria@dss.com',     'nombre' => 'Maria',     'fechaNacimiento' => '1990-01-18']);
        Pasajero::create(['correo' => 'lorena@dss.com',    'nombre' => 'Lorena',    'fechaNacimiento' => '1990-01-18']);
        Pasajero::create(['correo' => 'sara@dss.com',      'nombre' => 'Sara',      'fechaNacimiento' => '1990-01-18']);
    }
}
