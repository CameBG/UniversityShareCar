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
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'X5678YZ', 'Hora' => '09:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);

        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'ON4328A', 'Hora' => '09:20', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'RT5555A', 'Hora' => '07:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GB5456D', 'Hora' => '07:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'B1234CD', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'C1905BG', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'D8862AD', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GI0111S', 'Hora' => '08:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'XD4141D', 'Hora' => '13:00', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'AV3032V', 'Hora' => '13:00', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'LL3333P', 'Hora' => '15:00', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'HI5102R', 'Hora' => '15:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A8754MS', 'Hora' => '15:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'MP1808A', 'Hora' => '17:00', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'X5678YZ', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'C1905BG', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'B1234CD', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'AV3032V', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GI0111S', 'Hora' => '09:00', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'XD4141D', 'Hora' => '09:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A1234BC', 'Hora' => '09:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'HI5102R', 'Hora' => '15:00', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A8754MS', 'Hora' => '15:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'MP1808A', 'Hora' => '18:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'X5678YZ', 'Hora' => '08:00', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'C1905BG', 'Hora' => '08:00', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'MP1808A', 'Hora' => '09:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A8754MS', 'Hora' => '09:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'AV3032V', 'Hora' => '10:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GB5456D', 'Hora' => '10:20', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'D8862AD', 'Hora' => '10:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
       
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'X5678YZ', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'ON4328A', 'Hora' => '08:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'XD4141D', 'Hora' => '08:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'AV3032V', 'Hora' => '08:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'D8862AD', 'Hora' => '09:00', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GB5456D', 'Hora' => '09:00', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GI0111S', 'Hora' => '09:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'LL3333P', 'Hora' => '09:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'C1905BG', 'Hora' => '09:30', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'A1234BC', 'Hora' => '13:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'X5678YZ', 'Hora' => '14:15', 'Origen' => 'UA', 'Destino' => 'UA']);

        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'RT5555A', 'Hora' => '11:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'GB5456D', 'Hora' => '12:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'B1234CD', 'Hora' => '13:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'C1905BG', 'Hora' => '13:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'D8862AD', 'Hora' => '13:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'GI0111S', 'Hora' => '13:30', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'XD4141D', 'Hora' => '13:00', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'AV3032V', 'Hora' => '13:00', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'ON4328A', 'Hora' => '14:20', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'LL3333P', 'Hora' => '17:00', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'HI5102R', 'Hora' => '19:30', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'MP1808A', 'Hora' => '20:00', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'A8754MS', 'Hora' => '20:30', 'Origen' => 'UA', 'Destino' => 'UA']);
        
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'X5678YZ', 'Hora' => '13:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'C1905BG', 'Hora' => '13:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'B1234CD', 'Hora' => '13:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'AV3032V', 'Hora' => '13:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'GI0111S', 'Hora' => '14:00', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'XD4141D', 'Hora' => '14:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'HI5102R', 'Hora' => '17:00', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'A8754MS', 'Hora' => '17:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'A1234BC', 'Hora' => '17:30', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-22', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'MP1808A', 'Hora' => '21:30', 'Origen' => 'UA', 'Destino' => 'UA']);
        
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'X5678YZ', 'Hora' => '12:00', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'C1905BG', 'Hora' => '12:00', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'MP1808A', 'Hora' => '14:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'A8754MS', 'Hora' => '14:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'AV3032V', 'Hora' => '14:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'GB5456D', 'Hora' => '15:20', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'D8862AD', 'Hora' => '15:30', 'Origen' => 'UA', 'Destino' => 'UA']);
       
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'X5678YZ', 'Hora' => '13:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'ON4328A', 'Hora' => '13:30', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'XD4141D', 'Hora' => '13:30', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'AV3032V', 'Hora' => '13:30', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'D8862AD', 'Hora' => '14:00', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'GB5456D', 'Hora' => '14:00', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'GI0111S', 'Hora' => '15:15', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'LL3333P', 'Hora' => '15:30', 'Origen' => 'UA', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta',    'Coche_Matricula' => 'C1905BG', 'Hora' => '15:30', 'Origen' => 'UA', 'Destino' => 'UA']);
        
        
        
    }
}
