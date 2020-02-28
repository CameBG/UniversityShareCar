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
        Coche::create(['Matricula' => 'B1234CD', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1',     'Pasajeros' => 3, 'Conductor_DNI' => '12345678E']);
        Coche::create(['Matricula' => 'C1905BG', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX',     'Pasajeros' => 3, 'Conductor_DNI' => '12345678F']);
        Coche::create(['Matricula' => 'MP1808A', 'Marca' => 'Mercedes', 'Modelo' => 'modeloPeque', 'Pasajeros' => 3, 'Conductor_DNI' => '12345678J']);
        Coche::create(['Matricula' => 'AV3032V', 'Marca' => 'Honda',    'Modelo' => 'modelo5',     'Pasajeros' => 1, 'Conductor_DNI' => '12345678J']);
        Coche::create(['Matricula' => 'GB5456D', 'Marca' => 'Mercedes', 'Modelo' => 'modelo7A',    'Pasajeros' => 1, 'Conductor_DNI' => '12345678H']);
        Coche::create(['Matricula' => 'A8754MS', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1',     'Pasajeros' => 0, 'Conductor_DNI' => '12345678I']);
        Coche::create(['Matricula' => 'D8862AD', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX',     'Pasajeros' => 2, 'Conductor_DNI' => '12345678I']);
        Coche::create(['Matricula' => 'HI5102R', 'Marca' => 'Mercedes', 'Modelo' => 'modeloPeque', 'Pasajeros' => 3, 'Conductor_DNI' => '12345678K']);
        Coche::create(['Matricula' => 'ON4328A', 'Marca' => 'Honda',    'Modelo' => 'modelo5',     'Pasajeros' => 3, 'Conductor_DNI' => '12345678L']);
        Coche::create(['Matricula' => 'GI0111S', 'Marca' => 'Mercedes', 'Modelo' => 'modelo7A',    'Pasajeros' => 4, 'Conductor_DNI' => '12345678P']);

    }
}
