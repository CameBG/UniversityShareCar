<?php

use Illuminate\Database\Seeder;
use App\LineaSlot;
use App\Slot;
use App\Pasajero;

class LineaSlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LineaSlot::query()->delete();
        $slots = Slot::all();
        $pasajeros = Pasajero::all();
        $aux = 15; //Cantidad de pasajeros que vamos a asignar a las lineas slot, el resto seran null

        foreach ($slots as $slot) {
            $plazas = $slot->coche()->first()->Plazas;

            for($indice = 1; $indice <= $plazas; $indice++){
                if($aux >=0) {
                    LineaSlot::create(['Slot_id' => $slot->id, 'numAsiento' => $indice, 'Pasajero_id' => $pasajeros[$aux]->DNI]);
                    $aux--;
                }
                else {
                    LineaSlot::create(['Slot_id' => $slot->id, 'numAsiento' => $indice, 'Pasajero_id' => null]);
                }
            }
        }
    }
}
