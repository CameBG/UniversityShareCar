<?php

use Illuminate\Database\Seeder;
use App\Conductor;
use App\Ruta;

class ConductorsTableSeeder extends Seeder
{
    public function run()
    {
        $this->copyImages();
        Conductor::query()->delete();
        
        srand(0);
        $rutas = ruta::all();

        Conductor::create(['rutaImagen' => '2ran8bijhs.png', 'correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio',   'fechaNacimiento' => '1980-01-20', 'puntoRecogida' => 'punto1', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => '0nf62spzsk.png', 'correo' => 'emailej1B@dss.es', 'nombre' => 'Juan',      'fechaNacimiento' => '1980-01-21', 'puntoRecogida' => 'punto2', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => '00nzduoef7.png', 'correo' => 'emailej1C@dss.es', 'nombre' => 'María',     'fechaNacimiento' => '1980-01-25', 'puntoRecogida' => 'punto3', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => 'jjnd4xlfiy.png', 'correo' => 'emailej1D@dss.es', 'nombre' => 'Andrea',    'fechaNacimiento' => '1980-01-30', 'puntoRecogida' => 'punto4', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => 'knab5coiw4.png', 'correo' => 'emailej1E@dss.es', 'nombre' => 'Jose',      'fechaNacimiento' => '1980-01-18', 'puntoRecogida' => 'punto5', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => 'nq0h8jpq0j.png', 'correo' => 'emailej1F@dss.es', 'nombre' => 'Helena',    'fechaNacimiento' => '1995-01-20', 'puntoRecogida' => 'punto6', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => 'trd52vsu7v.png', 'correo' => 'emailej1G@dss.es', 'nombre' => 'Alba',      'fechaNacimiento' => '1995-06-20', 'puntoRecogida' => 'punto7', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => 'v7wqq9z2pr.png', 'correo' => 'emailej1H@dss.es', 'nombre' => 'Enma',      'fechaNacimiento' => '1995-06-25', 'puntoRecogida' => 'punto8', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => 'ls7i7yqqvm.png', 'correo' => 'emailej1I@dss.es', 'nombre' => 'David',     'fechaNacimiento' => '1995-06-24', 'puntoRecogida' => 'punto9', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => 'm562dsfnvt.png', 'correo' => 'emailej1K@dss.es', 'nombre' => 'Manuel',    'fechaNacimiento' => '1995-06-23', 'puntoRecogida' => 'punto1', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => 'ridwx8if16.png', 'correo' => 'emailej1J@dss.es', 'nombre' => 'Adrián',    'fechaNacimiento' => '1995-06-19', 'puntoRecogida' => 'punto2', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => 'tq55iq0oj3.png', 'correo' => 'emailej1L@dss.es', 'nombre' => 'Jorge',     'fechaNacimiento' => '1999-06-21', 'puntoRecogida' => 'punto3', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create(['rutaImagen' => 'ts6gh51tcx.png', 'correo' => 'emailej1M@dss.es', 'nombre' => 'Luis',      'fechaNacimiento' => '1999-06-22', 'puntoRecogida' => 'punto4', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create([                                  'correo' => 'emailej1N@dss.es', 'nombre' => 'Samuel',    'fechaNacimiento' => '1999-06-23', 'puntoRecogida' => 'punto5', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create([                                  'correo' => 'emailej1O@dss.es', 'nombre' => 'Sandra',    'fechaNacimiento' => '1999-06-23', 'puntoRecogida' => 'punto6', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create([                                  'correo' => 'emailej1P@dss.es', 'nombre' => 'Rubén',     'fechaNacimiento' => '1999-06-18', 'puntoRecogida' => 'punto7', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
        Conductor::create([                                  'correo' => 'emailej1Q@dss.es', 'nombre' => 'Alejandro', 'fechaNacimiento' => '2000-06-18', 'puntoRecogida' => 'punto8', 'ruta_id' => $rutas[rand()%count($rutas)]->id]);
    }

    public function copyImages(){
        if (file_exists("database/seeds/images/conductores/")) {
            // Creamos carpeta public/images/ si no existe
            if (!file_exists("public/images/")) {
                mkdir("public/images/", 0777, true);
            }

            // Obtenemos todos los nombres de los ficheros
            $files = glob("database/seeds/images/conductores/*");
            foreach($files as $file){
                if(is_file($file)){
                    copy($file, "public/images/" . basename($file));
                }
            }
        }
    }
}

