<?php

use Illuminate\Database\Seeder;
use App\Conductor;
use App\Ruta;

class ConductorsTableSeeder extends Seeder
{
    public function run()
    {
        Conductor::query()->delete();
        
        srand(0);
        $rutas = ruta::all();

        Conductor::create(['correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio',   'fechaNacimiento' => '1980-01-20', 'puntoRecogida' => 'punto1', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1B@dss.es', 'nombre' => 'Juan',      'fechaNacimiento' => '1980-01-21', 'puntoRecogida' => 'punto2', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1C@dss.es', 'nombre' => 'María',     'fechaNacimiento' => '1980-01-25', 'puntoRecogida' => 'punto3', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1D@dss.es', 'nombre' => 'Andrea',    'fechaNacimiento' => '1980-01-30', 'puntoRecogida' => 'punto4', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1E@dss.es', 'nombre' => 'Jose',      'fechaNacimiento' => '1980-01-18', 'puntoRecogida' => 'punto5', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1F@dss.es', 'nombre' => 'Helena',    'fechaNacimiento' => '1995-01-20', 'puntoRecogida' => 'punto6', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1G@dss.es', 'nombre' => 'Alba',      'fechaNacimiento' => '1995-06-20', 'puntoRecogida' => 'punto7', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1H@dss.es', 'nombre' => 'Enma',      'fechaNacimiento' => '1995-06-25', 'puntoRecogida' => 'punto8', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1I@dss.es', 'nombre' => 'David',     'fechaNacimiento' => '1995-06-24', 'puntoRecogida' => 'punto9', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1K@dss.es', 'nombre' => 'Manuel',    'fechaNacimiento' => '1995-06-23', 'puntoRecogida' => 'punto1', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1J@dss.es', 'nombre' => 'Adrián',    'fechaNacimiento' => '1995-06-19', 'puntoRecogida' => 'punto2', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1L@dss.es', 'nombre' => 'Jorge',     'fechaNacimiento' => '1999-06-21', 'puntoRecogida' => 'punto3', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1M@dss.es', 'nombre' => 'Luis',      'fechaNacimiento' => '1999-06-22', 'puntoRecogida' => 'punto4', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1N@dss.es', 'nombre' => 'Samuel',    'fechaNacimiento' => '1999-06-23', 'puntoRecogida' => 'punto5', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1O@dss.es', 'nombre' => 'Sandra',    'fechaNacimiento' => '1999-06-23', 'puntoRecogida' => 'punto6', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1P@dss.es', 'nombre' => 'Rubén',     'fechaNacimiento' => '1999-06-18', 'puntoRecogida' => 'punto7', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['correo' => 'emailej1Q@dss.es', 'nombre' => 'Alejandro', 'fechaNacimiento' => '2000-06-18', 'puntoRecogida' => 'punto8', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
    }
}

