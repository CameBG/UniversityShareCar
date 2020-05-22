<?php
namespace App\ServiceLayer;
use Illuminate\Support\Facades\DB;
use App\Slot;
use App\LineaSlot;
use App\Coche;

class PlazasLineasSlot {
    public static function crearSlot($fecha, $hora, $direccion, $coche) {
        DB::transaction(function($fecha, $hora, $direccion, $coche){
            $slot = Slot::create(['fecha' => $fecha, 'hora' => $hora, 'direccion' => $direccion, 'coche_matricula' => $coche]);
            
            $plazas = Coche::query()->where('matricula', $coche)->first()->plazas;

            for($indice = 1; $indice <= $plazas; $indice++){
                LineaSlot::create(['slot_id' => $slot->id, 'numAsiento' => $indice]);
            }
        });
    }
}