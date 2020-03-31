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
        Pasajero::create(['DNI' => '11111111A', 'Nombre' => 'Came', 'Edad' => 20, 'Genero' => 'Mujer', 'Correo' => 'came@dss.com', 'Imagen' => 'ruta/imagen', 'Telefono' => '666666666']);
        Pasajero::create(['DNI' => '11111111B', 'Nombre' => 'Edgar', 'Edad' => 20, 'Correo' => 'edgar@dss.com']);
        Pasajero::create(['DNI' => '11111111C', 'Nombre' => 'Sandra', 'Edad' => 23, 'Correo' => 'sandra@dss.com']);
        Pasajero::create(['DNI' => '11111111D', 'Nombre' => 'Tudor', 'Edad' => 21, 'Correo' => 'tudor@dss.com']);
        Pasajero::create(['DNI' => '11111111E', 'Nombre' => 'Estefania', 'Edad' => 33, 'Correo' => 'estefania@dss.com']);
        Pasajero::create(['DNI' => '22222222A', 'Nombre' => 'Paco', 'Edad' => 40, 'Correo' => 'paco@dss.com']);
        Pasajero::create(['DNI' => '22222222B', 'Nombre' => 'Jose', 'Edad' => 18, 'Correo' => 'jose@dss.com']);
        Pasajero::create(['DNI' => '22222222C', 'Nombre' => 'Javi', 'Edad' => 19, 'Correo' => 'javi@dss.com']);
        Pasajero::create(['DNI' => '22222222D', 'Nombre' => 'Fran', 'Edad' => 18, 'Correo' => 'fran@dss.com']);
        Pasajero::create(['DNI' => '22222222E', 'Nombre' => 'Sofia', 'Edad' => 21, 'Correo' => 'sofia@dss.com']);
        Pasajero::create(['DNI' => '33333333A', 'Nombre' => 'Felipe', 'Edad' => 22, 'Correo' => 'felipe@dss.com']);
        Pasajero::create(['DNI' => '33333333B', 'Nombre' => 'Daniel', 'Edad' => 21, 'Correo' => 'daniel@dss.com']);
        Pasajero::create(['DNI' => '33333333C', 'Nombre' => 'Alejandro', 'Edad' => 22, 'Correo' => 'alejandro@dss.com']);
        Pasajero::create(['DNI' => '33333333D', 'Nombre' => 'Roberto', 'Edad' => 23, 'Correo' => 'roberto@dss.com']);
        Pasajero::create(['DNI' => '33333333E', 'Nombre' => 'Fernando', 'Edad' => 26, 'Correo' => 'fernando@dss.com']);
        Pasajero::create(['DNI' => '44444444A', 'Nombre' => 'Andrea', 'Edad' => 17, 'Correo' => 'andrea@dss.com']);
        Pasajero::create(['DNI' => '44444444B', 'Nombre' => 'Alejandra', 'Edad' => 18, 'Correo' => 'alejandra@dss.com']);
        Pasajero::create(['DNI' => '44444444C', 'Nombre' => 'Maria', 'Edad' => 18, 'Correo' => 'maria@dss.com']);
        Pasajero::create(['DNI' => '44444444D', 'Nombre' => 'Lorena', 'Edad' => 18, 'Correo' => 'lorena@dss.com']);
        Pasajero::create(['DNI' => '44444444E', 'Nombre' => 'Sara', 'Edad' => 18, 'Correo' => 'sara@dss.com']);    
    }
}
