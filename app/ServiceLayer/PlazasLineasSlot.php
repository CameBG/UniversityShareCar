<?php
namespace App\ServiceLayer;
use Illuminate\Support\Facades\DB;
use App\Slot;
use App\LineaSlot;
use App\Coche;

class PlazasLineasSlot {
    public static function crearSlot($fecha, $hora, $direccion, $coche) {
        DB::transaction(function() use ($fecha, $hora, $direccion, $coche){
            $slot = Slot::create(['fecha' => $fecha, 'hora' => $hora, 'direccion' => $direccion, 'coche_matricula' => $coche]);
            
            $plazas = Coche::query()->where('matricula', $coche)->first()->plazas;

            for($indice = 1; $indice <= $plazas; $indice++){
                LineaSlot::create(['slot_id' => $slot->id, 'numAsiento' => $indice]);
            }
        });
    }

    public static function editarPlazas($plazas, $plazasAntigua, $matricula){
        DB::transaction(function() use ($plazas, $plazasAntigua, $matricula){
            if($plazas < $plazasAntigua){
                $slotsAnt = Slot::query()->where('coche_matricula', $coche->matricula)->get();
                
                foreach ($slotsAnt as $slot){
                    LineaSlot::query()->where('slot_id', $slot->id)->where('numAsiento', '>', $plazas)->delete();
                }
            } else if ($plazas > $plazasAntigua){
                $slots = Slot::query()->where('coche_matricula', $matricula)->get();

                foreach ($slots as $slot){
                    for ($i = $plazasAntigua + 1; $i <= $plazas; $i++){
                        LineaSlot::create(['slot_id' => $slot->id, 'numAsiento' => $i]);
                    }
                }
            }

            Coche::query()->where('matricula', $matricula)->update(['plazas' => $plazas]);
        });
    }
}