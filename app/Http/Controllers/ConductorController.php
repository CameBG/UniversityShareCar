<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Conductor;
use App\Coche;
use App\Pasajero;
use App\Slot;
use App\LineaSlot;

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

    public function misHorarios(Request $request){
        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');

        $fechaDesde = $request->input('fechaDesde');
        if (isset($fechaDesde)){
            $request->validate(['fechaDesde' => 'required|date']);
        }

        $fechaHasta = $request->input('fechaHasta');
        if (isset($fechaHasta)){
            $request->validate(['fechaHasta' => 'required|date']);
        }

        $select = Conductor::query()
                ->join('coches', 'conductors.correo', 'coches.conductor_correo')
                ->join('slots', 'coches.matricula', 'slots.coche_matricula')
                ->join('lineaSlots', 'slots.id', 'lineaSlots.slot_id')
                ->leftJoin('pasajeros', 'lineaSlots.pasajero_correo', 'pasajeros.correo')
                ->where('conductors.correo', Conductor::currentConductor()->correo)
                ->groupBy('coches.nombre', 'coches.marca', 'coches.modelo', 'slots.fecha', 'slots.hora', 'slots.direccion', 'coches.plazas');


        if(isset($sort)) { 
            if(isset($sort2) && ($sort === $sort2)) {
                $sort = null;
                $select = $select->orderBy($sort2, 'desc');
            }
            else {
                $select = $select->orderBy($sort, 'asc');
            }
        }
        elseif(isset($sort2)) {
            $select = $select->orderBy($sort2, 'desc');
        } 

        if(isset($fechaDesde)){
            if(isset($fechaHasta)){
                $select = $select->whereBetween('slots.fecha', [$fechaDesde, $fechaHasta]);
            }
        }

        $select = $select->select('coches.nombre as nombreCoche', 'coches.plazas as plazas', 'slots.fecha as fecha', 'slots.hora as hora', 'slots.direccion as direccion', DB::raw('count(pasajeros.correo) as asientos') )
        ->paginate(2);

        
        return view('conductor.mishorarios', ['result' => $select, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde' => $fechaDesde, 'fechaHasta' => $fechaHasta]);          
    }

    public function nuevoHorario_crear(Request $request){
        $request->validate(['fecha' => 'required|date',
                            'hora' => 'required',
                            'direccion' => 'required',
                            'coche' => 'required']);

        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $direccion = $request->input('direccion');
        $coche = $request->input('coche');

        $slot = Slot::create(['fecha' => $fecha, 'hora' => $hora, 'direccion' => $direccion, 'coche_matricula' => $coche]);
        
        $plazas = Coche::query()->where('matricula', $coche)->first()->plazas;

        for($indice = 1; $indice <= $plazas; $indice++){
            LineaSlot::create(['slot_id' => $slot->id, 'numAsiento' => $indice]);
        }

        return redirect('mishorarios');
    }
    public function nuevoHorario(Request $request){
        $coches = Conductor::currentConductor()->coches()->get();
        return view('conductor.nuevohorario', ['coches' => $coches]);
    }

}
