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
    }
}
