<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->deleteImages();
        $this->call(RutasTableSeeder::class);
        $this->call(ConductorsTableSeeder::class);
        $this->call(CochesTableSeeder::class);
        $this->call(SlotsTableSeeder::class);
        $this->call(PasajerosTableSeeder::class);
        $this->call(LineaSlotsTableSeeder::class);
    }

    public function deleteImages(){
        if (file_exists("public/images/")) {
            $files = glob("public/images/*"); //obtenemos todos los nombres de los ficheros
            foreach($files as $file){
                if(is_file($file)){
                    unlink($file); //elimino el fichero
                }
            }
        }
    }
}
