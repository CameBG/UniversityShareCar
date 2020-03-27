<?php

use Illuminate\Database\Seeder;
use App\Slot;

class SlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slot::query()->delete();
        Slot::create(['Fecha' => '2020-02-20', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A1234BC']);
        Slot::create(['Fecha' => '2020-02-20', 'Hora' => '09:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'RT5555A']);

        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '09:20', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'ON4328A']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '07:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'RT5555A']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '07:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GB5456D']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'B1234CD']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'C1905BG']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A1234BC']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '08:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GI0111S']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '13:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'XD4141D']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '13:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'AV3032V']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '15:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'LL3333P']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '15:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'HI5102R']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '15:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A8754MS']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '17:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'MP1808A']);
        
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'X5678YZ']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'C1905BG']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'B1234CD']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'AV3032V']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '09:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GI0111S']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '09:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'XD4141D']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '09:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'LL3333P']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '15:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'HI5102R']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '15:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A8754MS']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '18:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'MP1808A']);
        
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '08:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'X5678YZ']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '08:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'C1905BG']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '09:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'MP1808A']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '09:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A8754MS']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '10:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'AV3032V']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '10:20', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GB5456D']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '10:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'EP1803H']);
       
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'X5678YZ']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '08:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'ON4328A']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '08:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'XD4141D']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '08:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'AV3032V']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '09:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'D8862AD']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '09:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GB5456D']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '09:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'GI0111S']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '09:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'LL3333P']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '09:30', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'C1905BG']);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        Slot::create(['Fecha' => '2020-02-20', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'A1234BC']);
        Slot::create(['Fecha' => '2020-02-20', 'Hora' => '14:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'RT5555A']);

        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '11:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'ON4328A']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '12:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'RT5555A']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'GB5456D']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'B1234CD']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'C1905BG']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '13:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'A1234BC']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '13:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'GI0111S']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '13:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'XD4141D']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '14:20', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'AV3032V']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '17:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'LL3333P']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '19:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'HI5102R']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '20:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'A8754MS']);
        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '20:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'MP1808A']);
        
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'X5678YZ']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'C1905BG']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'B1234CD']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'AV3032V']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '14:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'GI0111S']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '14:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'XD4141D']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '17:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'LL3333P']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '17:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'HI5102R']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '17:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'A8754MS']);
        Slot::create(['Fecha' => '2020-02-22', 'Hora' => '21:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'MP1808A']);
        
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '12:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'X5678YZ']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '12:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'C1905BG']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '14:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'MP1808A']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '14:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'A8754MS']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '14:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'AV3032V']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '15:20', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'GB5456D']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '15:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'EP1803H']);
       
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'X5678YZ']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '13:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'ON4328A']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '13:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'XD4141D']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '13:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'AV3032V']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '14:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'D8862AD']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '14:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'GB5456D']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '15:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'GI0111S']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '15:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'LL3333P']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '15:30', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'C1905BG']);
    }
}
