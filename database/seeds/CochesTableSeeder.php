<?php

use Illuminate\Database\Seeder;
use App\Coche;
use App\Ruta;

class CochesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coche::query()->delete();
        $rutas = ruta::all();
        $ids = array();
        foreach ($rutas as $ruta) {
            $ids[] = $ruta->id;
        }
        

        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678A' , 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'X5678YZ', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX',     'Plazas' => 4, 'Precio' => 1.5, 'Conductor_DNI' => '12345678A' , 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'HI5102R', 'Marca' => 'Mercedes', 'Modelo' => 'modeloL',     'Plazas' => 4, 'Precio' => 1.5, 'Conductor_DNI' => '12345678K' , 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG',     'Plazas' => 3, 'Precio' => 1,   'Conductor_DNI' => '12345678L' , 'Ruta_id' => $ids[array_rand($ids, 1)]]);

        Coche::create(['Matricula' => 'RT5555A', 'Marca' => 'Mercedes', 'Modelo' => 'modeloPeque', 'Plazas' => 2, 'Precio' => 1,   'Conductor_DNI' => '12345678B', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'LL3333P', 'Marca' => 'Honda',    'Modelo' => 'modelo5',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678C', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'XD4141D', 'Marca' => 'Subaru',   'Modelo' => 'modelo7A',    'Plazas' => 4, 'Precio' => 1.5, 'Conductor_DNI' => '12345678D', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'B1234CD', 'Marca' => 'Audi',     'Modelo' => 'modelo1',     'Plazas' => 3, 'Precio' => 2,   'Conductor_DNI' => '12345678E', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'C1905BG', 'Marca' => 'Dacia',    'Modelo' => 'modeloX',     'Plazas' => 3, 'Precio' => 1,   'Conductor_DNI' => '12345678F', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'MP1808A', 'Marca' => 'Skoda',    'Modelo' => 'modeloS',     'Plazas' => 3, 'Precio' => 1,   'Conductor_DNI' => '12345678J', 'Ruta_id' => $ids[array_rand($ids, 1)]]);

        Coche::create(['Matricula' => 'AV3032V', 'Marca' => 'Honda',    'Modelo' => 'modeloF',     'Plazas' => 4, 'Precio' => 2,   'Conductor_DNI' => '12345678J' , 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'GB5456D', 'Marca' => 'Ford',     'Modelo' => 'modeloJ',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678H', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'A8754MS', 'Marca' => 'BMW',      'Modelo' => 'modeloP',     'Plazas' => 3, 'Precio' => 1,   'Conductor_DNI' => '12345678I', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'D8862AD', 'Marca' => 'Hyundai',  'Modelo' => 'modeloZ',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678I', 'Ruta_id' => $ids[array_rand($ids, 1)]]);

        Coche::create(['Matricula' => 'GI0111S', 'Marca' => 'Audi',     'Modelo' => 'modeloQ',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678P', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'AA1919M', 'Marca' => 'Jeep',     'Modelo' => 'modeloG',     'Plazas' => 3, 'Precio' => 2,   'Conductor_DNI' => '12345678Q' , 'Ruta_id' => $ids[array_rand($ids, 1)]]);
        Coche::create(['Matricula' => 'EP1803H', 'Marca' => 'Volvo',    'Modelo' => 'modeloQ',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678O', 'Ruta_id' => $ids[array_rand($ids, 1)]]);
    }
}
