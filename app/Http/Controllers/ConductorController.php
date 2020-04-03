<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Conductor;
use App\Pasajero;

class ConductorController extends Controller
{
    public function pasajeros(Request $request){
        $fechaElegida = $request->input('fechaElegida');
        if (isset($fechaElegida)){
            $request->validate([
                'fechaElegida' => 'required|date'
            ]);
        }
        $personaElegida = $request->input('personaElegida');
        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');
        $cocheElegido = $request->query('cocheElegido');

        $coches = Conductor::query()
                        ->join('coches', 'conductors.correo', 'coches.conductor_correo')
                        ->where('conductors.correo', Conductor::currentConductor()->correo)
                        ->select('coches.nombre as nombreCoche')->get();

        $filas = Conductor::query()
            ->join('coches', 'conductors.correo', 'coches.conductor_correo')
            ->join('slots', 'coches.matricula', 'slots.coche_matricula')
            ->join('lineaSlots', 'slots.id', 'lineaSlots.slot_id')
            ->join('pasajeros', 'lineaSlots.pasajero_correo', 'pasajeros.correo')
            ->where('conductors.correo', Conductor::currentConductor()->correo);

        if(isset($personaElegida)){
            $filas = $filas->where('pasajeros.nombre', 'like', '%'.$personaElegida.'%');
        }

        if(isset($cocheElegido)){
            $filas = $filas->where('coches.nombre', $cocheElegido);
        }

        if(isset($fechaElegida)){
            $filas = $filas->whereDate('slots.fecha', $fechaElegida);
        }

        $filas = $filas->groupBy('pasajeros.nombre', 'coches.nombre', 'slots.fecha', 'slots.hora', 'slots.direccion');

        if(isset($sort)){
            if(isset($sort2) && ($sort === $sort2)){
                $sort = null;
                $filas = $filas->orderBy($sort2, 'desc');
            }
            else {
                $filas = $filas->orderBy($sort, 'asc');
            }
        }
        elseif(isset($sort2)){
            $filas = $filas->orderBy($sort2, 'desc');
        }

        $filas = $filas->select('pasajeros.nombre as nombrePasajero', 'coches.nombre as nombreCoche', DB::raw('count(*) as asientos'), 'slots.fecha', 'slots.hora', 'slots.direccion')->paginate(2);

        return view('conductor.pasajeros', ['filas' => $filas, 'coches' => $coches, 'sort' => $sort, 'sort2' => $sort2, 'personaElegida' => $personaElegida, 'cocheElegido' => $cocheElegido, 'fechaElegida' => $fechaElegida]);
    }
}
