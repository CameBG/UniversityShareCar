<?php

use Illuminate\Database\Seeder;
use App\Slot;

class SlotsTableSeeder extends Seeder
{
    public function run()
    {
        Slot::query()->delete();
        
        Slot::create(['fecha' => '2020-02-20', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'A1234BC']);
        Slot::create(['fecha' => '2020-02-20', 'hora' => '09:15', 'direccion' => 'Ida',    'coche_matricula' => 'RT5555A']);

        Slot::create(['fecha' => '2020-02-21', 'hora' => '09:20', 'direccion' => 'Ida',    'coche_matricula' => 'ON4328A']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '07:15', 'direccion' => 'Ida',    'coche_matricula' => 'RT5555A']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '07:15', 'direccion' => 'Ida',    'coche_matricula' => 'GB5456D']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'B1234CD']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'C1905BG']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'A1234BC']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '08:30', 'direccion' => 'Ida',    'coche_matricula' => 'GI0111S']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '13:00', 'direccion' => 'Ida',    'coche_matricula' => 'XD4141D']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '13:00', 'direccion' => 'Ida',    'coche_matricula' => 'AV3032V']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '15:00', 'direccion' => 'Ida',    'coche_matricula' => 'LL3333P']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '15:30', 'direccion' => 'Ida',    'coche_matricula' => 'HI5102R']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '15:30', 'direccion' => 'Ida',    'coche_matricula' => 'A8754MS']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '17:00', 'direccion' => 'Ida',    'coche_matricula' => 'MP1808A']);
        
        Slot::create(['fecha' => '2020-02-22', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'X5678YZ']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'C1905BG']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'B1234CD']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'AV3032V']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '09:00', 'direccion' => 'Ida',    'coche_matricula' => 'GI0111S']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '09:15', 'direccion' => 'Ida',    'coche_matricula' => 'XD4141D']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '09:30', 'direccion' => 'Ida',    'coche_matricula' => 'LL3333P']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '15:00', 'direccion' => 'Ida',    'coche_matricula' => 'HI5102R']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '15:15', 'direccion' => 'Ida',    'coche_matricula' => 'A8754MS']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '18:30', 'direccion' => 'Ida',    'coche_matricula' => 'MP1808A']);
        
        Slot::create(['fecha' => '2020-02-23', 'hora' => '08:00', 'direccion' => 'Ida',    'coche_matricula' => 'X5678YZ']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '08:00', 'direccion' => 'Ida',    'coche_matricula' => 'C1905BG']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '09:15', 'direccion' => 'Ida',    'coche_matricula' => 'MP1808A']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '09:15', 'direccion' => 'Ida',    'coche_matricula' => 'A8754MS']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '10:15', 'direccion' => 'Ida',    'coche_matricula' => 'AV3032V']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '10:20', 'direccion' => 'Ida',    'coche_matricula' => 'GB5456D']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '10:30', 'direccion' => 'Ida',    'coche_matricula' => 'EP1803H']);
       
        Slot::create(['fecha' => '2020-02-24', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'X5678YZ']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '08:30', 'direccion' => 'Ida',    'coche_matricula' => 'ON4328A']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '08:30', 'direccion' => 'Ida',    'coche_matricula' => 'XD4141D']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '08:30', 'direccion' => 'Ida',    'coche_matricula' => 'AV3032V']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '09:00', 'direccion' => 'Ida',    'coche_matricula' => 'D8862AD']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '09:00', 'direccion' => 'Ida',    'coche_matricula' => 'GB5456D']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '09:15', 'direccion' => 'Ida',    'coche_matricula' => 'GI0111S']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '09:30', 'direccion' => 'Ida',    'coche_matricula' => 'LL3333P']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '09:30', 'direccion' => 'Ida',    'coche_matricula' => 'C1905BG']);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        Slot::create(['fecha' => '2020-02-20', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'A1234BC']);
        Slot::create(['fecha' => '2020-02-20', 'hora' => '14:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'RT5555A']);

        Slot::create(['fecha' => '2020-02-21', 'hora' => '11:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'ON4328A']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '12:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'RT5555A']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'GB5456D']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'B1234CD']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'C1905BG']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '13:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'A1234BC']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '13:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'GI0111S']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '13:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'XD4141D']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '14:20', 'direccion' => 'Vuelta', 'coche_matricula' => 'AV3032V']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '17:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'LL3333P']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '19:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'HI5102R']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '20:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'A8754MS']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '20:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'MP1808A']);
        
        Slot::create(['fecha' => '2020-02-22', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'X5678YZ']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'C1905BG']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'B1234CD']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'AV3032V']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '14:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'GI0111S']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '14:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'XD4141D']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '17:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'LL3333P']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '17:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'HI5102R']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '17:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'A8754MS']);
        Slot::create(['fecha' => '2020-02-22', 'hora' => '21:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'MP1808A']);
        
        Slot::create(['fecha' => '2020-02-23', 'hora' => '12:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'X5678YZ']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '12:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'C1905BG']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '14:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'MP1808A']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '14:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'A8754MS']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '14:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'AV3032V']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '15:20', 'direccion' => 'Vuelta', 'coche_matricula' => 'GB5456D']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '15:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'EP1803H']);
       
        Slot::create(['fecha' => '2020-02-24', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'X5678YZ']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '13:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'ON4328A']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '13:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'XD4141D']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '13:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'AV3032V']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '14:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'D8862AD']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '14:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'GB5456D']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '15:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'GI0111S']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '15:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'LL3333P']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '15:30', 'direccion' => 'Vuelta', 'coche_matricula' => 'C1905BG']);
    }
}
