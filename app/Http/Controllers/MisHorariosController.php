<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Conductor;
class MisHorariosController extends Controller
{
    
    public function showHorarios(){

        $select = Conductor::query()
                        ->join('coches', 'conductors.correo', 'coches.conductor_correo')
                        ->join('slots', 'coches.matricula', 'slots.coche_matricula')
                        ->join('lineaSlots', 'slots.id', 'lineaSlots.slot_id')
                        ->leftJoin('pasajeros', 'lineaSlots.pasajero_correo', 'pasajeros.correo')
                        ->where('conductors.correo', Conductor::currentConductor()->correo)
                        ->groupBy('coches.nombre', 'coches.marca', 'coches.modelo', 'slots.fecha', 'slots.hora', 'slots.direccion', 'coches.plazas')
                        ->select('coches.nombre as nombreCoche', 'coches.plazas as plazas', 'slots.fecha as fecha', 'slots.hora as hora', 'slots.direccion as direccion', DB::raw('count(pasajeros.correo) as asientos') )
                        ->paginate(5);
        return view('conductor.mishorarios', ['result' => $select]);
    }
}
