<?php

use Illuminate\Database\Seeder;
use App\Conductor;
use App\Ruta;

class ConductorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        Conductor::query()->delete();

        $rutas = ruta::all();
        $ids = array();
        foreach ($rutas as $ruta) {
            $ids[] = $ruta->id;
        }

        Conductor::create(['Correo' => 'emailej1A@dss.es', 'Nombre' => 'Antonio',   'Edad' => 20, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1B@dss.es', 'Nombre' => 'Juan',      'Edad' => 21, 'Punto_de_Recogida' => 'punto2', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1C@dss.es', 'Nombre' => 'María',     'Edad' => 25, 'Punto_de_Recogida' => 'punto3', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1D@dss.es', 'Nombre' => 'Andrea',    'Edad' => 30, 'Punto_de_Recogida' => 'punto4', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1E@dss.es', 'Nombre' => 'Jose',      'Edad' => 18, 'Punto_de_Recogida' => 'punto5', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1F@dss.es', 'Nombre' => 'Helena',    'Edad' => 20, 'Punto_de_Recogida' => 'punto6', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1G@dss.es', 'Nombre' => 'Alba',      'Edad' => 20, 'Punto_de_Recogida' => 'punto7', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1H@dss.es', 'Nombre' => 'Enma',      'Edad' => 25, 'Punto_de_Recogida' => 'punto8', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1I@dss.es', 'Nombre' => 'David',     'Edad' => 24, 'Punto_de_Recogida' => 'punto9', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1K@dss.es', 'Nombre' => 'Manuel',    'Edad' => 23, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1J@dss.es', 'Nombre' => 'Adrián',    'Edad' => 19, 'Punto_de_Recogida' => 'punto2', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1L@dss.es', 'Nombre' => 'Jorge',     'Edad' => 21, 'Punto_de_Recogida' => 'punto3', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1M@dss.es', 'Nombre' => 'Luis',      'Edad' => 22, 'Punto_de_Recogida' => 'punto4', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1N@dss.es', 'Nombre' => 'Samuel',    'Edad' => 23, 'Punto_de_Recogida' => 'punto5', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1O@dss.es', 'Nombre' => 'Sandra',    'Edad' => 23, 'Punto_de_Recogida' => 'punto6', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1P@dss.es', 'Nombre' => 'Rubén',     'Edad' => 18, 'Punto_de_Recogida' => 'punto7', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Conductor::create(['Correo' => 'emailej1Q@dss.es', 'Nombre' => 'Alejandro', 'Edad' => 18, 'Punto_de_Recogida' => 'punto8', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
    }
}

