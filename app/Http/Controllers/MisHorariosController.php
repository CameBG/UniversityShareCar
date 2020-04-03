<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Conductor;
class MisHorariosController extends Controller
{
    
    public function showHorarios(Request $request){
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
}
