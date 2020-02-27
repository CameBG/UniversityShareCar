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
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1',     'Pasajeros' => 4, 'Conductor_DNI' => '12345678A']);
        Coche::create(['Matricula' => 'X5678YZ', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX',     'Pasajeros' => 4, 'Conductor_DNI' => '12345678A']);
        Coche::create(['Matricula' => 'RT5555A', 'Marca' => 'Mercedes', 'Modelo' => 'modeloPeque', 'Pasajeros' => 2, 'Conductor_DNI' => '12345678B']);
        Coche::create(['Matricula' => 'LL3333P', 'Marca' => 'Honda',    'Modelo' => 'modelo5',     'Pasajeros' => 4, 'Conductor_DNI' => '12345678C']);
        Coche::create(['Matricula' => 'XD4141D', 'Marca' => 'Mercedes', 'Modelo' => 'modelo7A',    'Pasajeros' => 4, 'Conductor_DNI' => '12345678D']);
    }
}
