<?php

use Illuminate\Database\Seeder;
use App\LineaSlot;
use App\Slot;
use App\Pasajero;

class LineaSlotsTableSeeder extends Seeder
{
    public function run()
    {
        LineaSlot::query()->delete();
        
        $slots = Slot::all();
        $pasajeros = Pasajero::all();
        $aux = 15; //Cantidad de pasajeros que vamos a asignar a las lineas slot, el resto seran null

        foreach ($slots as $slot) {
            $plazas = $slot->coche()->first()->plazas;

            for($indice = 1; $indice <= $plazas; $indice++){
                if($aux >=0) {
                    LineaSlot::create(['slot_id' => $slot->id, 'numAsiento' => $indice, 'pasajero_correo' => $pasajeros[$aux]->correo]);
                    $aux--;
                }
                else {
                    LineaSlot::create(['slot_id' => $slot->id, 'numAsiento' => $indice]);
                }
            }
        }
        /*
        Slot::create(['fecha' => '2010-02-22', 'hora' => '08:15', 'direccion' => 'Vuelta',    'coche_matricula' => 'X5678YZ']);
        Slot::create(['fecha' => '2015-02-22', 'hora' => '08:15', 'direccion' => 'Vuelta',    'coche_matricula' => 'B1234CD']);
        Slot::create(['fecha' => '2015-03-22', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'B1234CD']);
        Slot::create(['fecha' => '2016-03-22', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'B1234CD']);
        Slot::create(['fecha' => '2017-03-22', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'EP1803H']);
        Slot::create(['fecha' => '2018-03-22', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'EP1803H']);

        $id_aux  = Slot::query()->where('fecha', '2010-02-22')->first()->id;
        $id_aux2 = Slot::query()->where('fecha', '2015-02-22')->first()->id;
        $id_aux3 = Slot::query()->where('fecha', '2015-03-22')->first()->id;
        $id_aux4 = Slot::query()->where('fecha', '2016-03-22')->first()->id;
        $id_aux5 = Slot::query()->where('fecha', '2017-03-22')->first()->id;
        $id_aux6 = Slot::query()->where('fecha', '2018-03-22')->first()->id;

        LineaSlot::create(['slot_id' => $id_aux, 'numAsiento' => 2, 'pasajero_correo' => 'daniel@dss.com']);
        LineaSlot::create(['slot_id' => $id_aux, 'numAsiento' => 1, 'pasajero_correo' => 'daniel@dss.com']);

        
        LineaSlot::create(['slot_id' => $id_aux2, 'numAsiento' => 1, 'pasajero_correo' => 'alejandra@dss.com']);
        LineaSlot::create(['slot_id' => $id_aux2, 'numAsiento' => 2, 'pasajero_correo' => 'alejandra@dss.com']);

        LineaSlot::create(['slot_id' => $id_aux3, 'numAsiento' => 1, 'pasajero_correo' => 'alejandra@dss.com']);
        LineaSlot::create(['slot_id' => $id_aux3, 'numAsiento' => 2, 'pasajero_correo' => 'alejandra@dss.com']);

        LineaSlot::create(['slot_id' => $id_aux4, 'numAsiento' => 1, 'pasajero_correo' => 'alejandra@dss.com']);
        LineaSlot::create(['slot_id' => $id_aux4, 'numAsiento' => 2, 'pasajero_correo' => 'alejandra@dss.com']);

        LineaSlot::create(['slot_id' => $id_aux5, 'numAsiento' => 2, 'pasajero_correo' => 'alejandra@dss.com']);

        LineaSlot::create(['slot_id' => $id_aux6, 'numAsiento' => 1, 'pasajero_correo' => 'alejandra@dss.com']);
        LineaSlot::create(['slot_id' => $id_aux6, 'numAsiento' => 2, 'pasajero_correo' => 'alejandra@dss.com']);
        
        */
        
    }
}
