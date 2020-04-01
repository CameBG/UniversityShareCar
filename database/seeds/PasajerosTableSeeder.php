<?php

use Illuminate\Database\Seeder;
use App\Pasajero;

class PasajerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pasajero::query()->delete();
        Pasajero::create(['Correo' => 'came@dss.com', 'Nombre' => 'Came', 'Edad' => 20, 'Genero' => 'Mujer', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'edgar@dss.com', 'Nombre' => 'Edgar', 'Edad' => 20, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'sandra@dss.com', 'Nombre' => 'Sandra', 'Edad' => 23, 'Genero' => 'Mujer', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'tudor@dss.com', 'Nombre' => 'Tudor', 'Edad' => 21, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'estefania@dss.com', 'Nombre' => 'Estefania', 'Edad' => 33, 'Genero' => 'Mujer', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'paco@dss.com', 'Nombre' => 'Paco', 'Edad' => 40, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'jose@dss.com', 'Nombre' => 'Jose', 'Edad' => 18, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'javi@dss.com', 'Nombre' => 'Javi', 'Edad' => 19, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'fran@dss.com', 'Nombre' => 'Fran', 'Edad' => 18, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'sofia@dss.com', 'Nombre' => 'Sofia', 'Edad' => 21, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'felipe@dss.com', 'Nombre' => 'Felipe', 'Edad' => 22, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'daniel@dss.com', 'Nombre' => 'Daniel', 'Edad' => 21, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'alejandro@dss.com', 'Nombre' => 'Alejandro', 'Edad' => 22, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'roberto@dss.com', 'Nombre' => 'Roberto', 'Edad' => 23, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'fernando@dss.com', 'Nombre' => 'Fernando', 'Edad' => 26, 'Genero' => 'Hombre', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['Correo' => 'andrea@dss.com', 'Nombre' => 'Andrea', 'Edad' => 17]);
        Pasajero::create(['Correo' => 'alejandra@dss.com', 'Nombre' => 'Alejandra', 'Edad' => 18]);
        Pasajero::create(['Correo' => 'maria@dss.com', 'Nombre' => 'Maria', 'Edad' => 18]);
        Pasajero::create(['Correo' => 'lorena@dss.com', 'Nombre' => 'Lorena', 'Edad' => 18]);
        Pasajero::create(['Correo' => 'sara@dss.com', 'Nombre' => 'Sara', 'Edad' => 18]);    
    }
}
