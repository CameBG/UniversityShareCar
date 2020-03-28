<?php

use Illuminate\Database\Seeder;
use App\LineaSlot;
use App\Slot;

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
        foreach ($slots as $slot) {
            $plazas = $slot->coche()->first()->Plazas;

            for($indice = 1; $indice <= $plazas; $indice++){
                LineaSlot::create(['Slot_id' => $slot->id, 'numAsiento' => $indice]);
            }
        }
    }
}
