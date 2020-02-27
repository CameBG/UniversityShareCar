<?php

use Illuminate\Database\Seeder;
use App\Horario;

class HorariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::query()->delete();
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15']);
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'X5678YZ', 'Hora' => '09:15']);
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'A1234BC', 'Hora' => '18:00']);
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'X5678YZ', 'Hora' => '14:30']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15']);
    }
}
