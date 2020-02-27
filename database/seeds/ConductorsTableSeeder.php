<?php

use Illuminate\Database\Seeder;
use App\Conductor;

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
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Conductor::create(['DNI' => '12345678B', 'Nombre' => 'Juan',    'Edad' => 21, 'Correo' => 'juan@dss.com']);
        Conductor::create(['DNI' => '12345678C', 'Nombre' => 'María',   'Edad' => 25, 'Correo' => 'maria@dss.com']);
        Conductor::create(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
    }
}
