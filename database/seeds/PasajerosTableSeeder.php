<?php

use Illuminate\Database\Seeder;
use App\Pasajero;

class PasajerosTableSeeder extends Seeder
{
    public function run()
    {
        $this->copyImages();
        Pasajero::query()->delete();
        
        Pasajero::create(['rutaImagen' => 'gc2faa6nrf.png', 'correo' => 'came@dss.com',      'nombre' => 'Came',      'fechaNacimiento' => '1990-01-20', 'genero' => 'Mujer' , 'telefono' => '666666666']);
        Pasajero::create(['rutaImagen' => '9e1pufo70z.png', 'correo' => 'edgar@dss.com',     'nombre' => 'Edgar',     'fechaNacimiento' => '1990-01-20', 'genero' => 'Hombre']);
        Pasajero::create(['rutaImagen' => '0nz5e1ctx7.png', 'correo' => 'sandra@dss.com',    'nombre' => 'Sandra',    'fechaNacimiento' => '1990-01-23', 'genero' => 'Mujer' ]);
        Pasajero::create(['rutaImagen' => '382nm4hnxe.png', 'correo' => 'tudor@dss.com',     'nombre' => 'Tudor',     'fechaNacimiento' => '1990-01-21', 'genero' => 'Hombre']);
        Pasajero::create(['rutaImagen' => 'k2gksc6to7.png', 'correo' => 'paco@dss.com',      'nombre' => 'Paco',      'fechaNacimiento' => '1990-01-01', 'genero' => 'Hombre']);
        Pasajero::create(['rutaImagen' => 'm1ns6cbs7d.png', 'correo' => 'jose@dss.com',      'nombre' => 'Jose',      'fechaNacimiento' => '1990-01-18', 'genero' => 'Hombre']);
        Pasajero::create(['rutaImagen' => 'pp5awtjsau.png', 'correo' => 'fran@dss.com',      'nombre' => 'Fran',      'fechaNacimiento' => '1990-01-18', 'genero' => 'Hombre']);
        Pasajero::create(['rutaImagen' => 'nyr4zsuvjj.png', 'correo' => 'sofia@dss.com',     'nombre' => 'Sofia',     'fechaNacimiento' => '1990-01-21', 'genero' => 'Hombre']);
        Pasajero::create(['rutaImagen' => 'wtdl44q9fp.png', 'correo' => 'felipe@dss.com',    'nombre' => 'Felipe',    'fechaNacimiento' => '1990-01-22', 'genero' => 'Hombre']);
        Pasajero::create(['rutaImagen' => 'mqk3qd3dpp.png', 'correo' => 'dani@dss.com',      'nombre' => 'Daniel',    'fechaNacimiento' => '1990-01-21', 'genero' => 'Hombre']);
        Pasajero::create([                                  'correo' => 'estefania@dss.com', 'nombre' => 'Estefania', 'fechaNacimiento' => '1990-01-03', 'genero' => 'Mujer' ]);
        Pasajero::create([                                  'correo' => 'roberto@dss.com',   'nombre' => 'Roberto',   'fechaNacimiento' => '1990-01-23', 'genero' => 'Hombre']);
        Pasajero::create([                                  'correo' => 'fernando@dss.com',  'nombre' => 'Fernando',  'fechaNacimiento' => '1990-01-26', 'genero' => 'Hombre']);
        Pasajero::create(['rutaImagen' => 'x2v5u0c174.png', 'correo' => 'alejandra@dss.com', 'nombre' => 'Alejandra', 'fechaNacimiento' => '1990-01-18']);
        Pasajero::create([                                  'correo' => 'maria@dss.com',     'nombre' => 'Maria',     'fechaNacimiento' => '1990-01-18']);
        Pasajero::create([                                  'correo' => 'lorena@dss.com',    'nombre' => 'Lorena',    'fechaNacimiento' => '1990-01-18']);
        Pasajero::create([                                  'correo' => 'sara@dss.com',      'nombre' => 'Sara',      'fechaNacimiento' => '1990-01-18']);
    }

    public function copyImages(){
        if (file_exists("database/seeds/images/pasajeros/")) {
            // Creamos carpeta public/images/ si no existe
            if (!file_exists("public/images/")) {
                mkdir("public/images/", 0777, true);
            }

            // Obtenemos todos los nombres de los ficheros
            $files = glob("database/seeds/images/pasajeros/*");
            foreach($files as $file){
                if(is_file($file)){
                    copy($file, "public/images/" . basename($file));
                }
            }
        }
    }
}
