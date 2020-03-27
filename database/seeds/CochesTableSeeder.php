<?php

use Illuminate\Database\Seeder;
use App\Coche;

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
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678A']);
        Coche::create(['Matricula' => 'X5678YZ', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX',     'Plazas' => 4, 'Precio' => 1.5, 'Conductor_DNI' => '12345678A']);
        Coche::create(['Matricula' => 'RT5555A', 'Marca' => 'Mercedes', 'Modelo' => 'modeloPeque', 'Plazas' => 2, 'Precio' => 1,   'Conductor_DNI' => '12345678B']);
        Coche::create(['Matricula' => 'LL3333P', 'Marca' => 'Honda',    'Modelo' => 'modelo5',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678C']);
        Coche::create(['Matricula' => 'XD4141D', 'Marca' => 'Subaru',   'Modelo' => 'modelo7A',    'Plazas' => 4, 'Precio' => 1.5, 'Conductor_DNI' => '12345678D']);
        Coche::create(['Matricula' => 'B1234CD', 'Marca' => 'Audi',     'Modelo' => 'modelo1',     'Plazas' => 3, 'Precio' => 2,   'Conductor_DNI' => '12345678E']);
        Coche::create(['Matricula' => 'C1905BG', 'Marca' => 'Dacia',    'Modelo' => 'modeloX',     'Plazas' => 3, 'Precio' => 1,   'Conductor_DNI' => '12345678F']);
        Coche::create(['Matricula' => 'MP1808A', 'Marca' => 'Skoda',    'Modelo' => 'modeloS',     'Plazas' => 3, 'Precio' => 1,   'Conductor_DNI' => '12345678J']);
        Coche::create(['Matricula' => 'AV3032V', 'Marca' => 'Honda',    'Modelo' => 'modeloF',     'Plazas' => 4, 'Precio' => 2,   'Conductor_DNI' => '12345678J']);
        Coche::create(['Matricula' => 'GB5456D', 'Marca' => 'Ford',     'Modelo' => 'modeloJ',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678H']);
        Coche::create(['Matricula' => 'A8754MS', 'Marca' => 'BMW',      'Modelo' => 'modeloP',     'Plazas' => 3, 'Precio' => 1,   'Conductor_DNI' => '12345678I']);
        Coche::create(['Matricula' => 'D8862AD', 'Marca' => 'Hyundai',  'Modelo' => 'modeloZ',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678I']);
        Coche::create(['Matricula' => 'HI5102R', 'Marca' => 'Mercedes', 'Modelo' => 'modeloL',     'Plazas' => 4, 'Precio' => 1.5, 'Conductor_DNI' => '12345678K']);
        Coche::create(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG',     'Plazas' => 3, 'Precio' => 1,   'Conductor_DNI' => '12345678L']);
        Coche::create(['Matricula' => 'GI0111S', 'Marca' => 'Audi',     'Modelo' => 'modeloQ',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678P']);
        Coche::create(['Matricula' => 'AA1919M', 'Marca' => 'Jeep',     'Modelo' => 'modeloG',     'Plazas' => 3, 'Precio' => 2,   'Conductor_DNI' => '12345678Q']);
        Coche::create(['Matricula' => 'EP1803H', 'Marca' => 'Volvo',    'Modelo' => 'modeloQ',     'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678O']);
    }
}
