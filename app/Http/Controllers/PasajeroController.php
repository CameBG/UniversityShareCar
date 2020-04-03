<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Pasajero;

class PasajeroController extends Controller
{
    public function misReservas(Request $request){
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

        $select = Pasajero::query()    
                ->leftJoin('lineaSlots', 'lineaSlots.pasajero_correo', 'pasajeros.correo')          
                ->join('slots', 'lineaSlots.slot_id', 'slots.id') 
                ->join('coches', 'slots.coche_matricula', 'coches.matricula')
                ->join('conductors', 'coches.conductor_correo', 'conductors.correo')
                ->join('rutas', 'conductors.ruta_id', 'rutas.id')
                ->where('pasajeros.correo', Pasajero::currentPasajero()->correo)
                ->groupBy('slots.fecha', 'slots.hora', 'slots.direccion', 'conductors.puntoRecogida', 'rutas.localidad', 'coches.precioViaje', 'coches.nombre', 'conductors.apellido1', 'conductors.apellido2', 'conductors.nombre', 'rutas.universidad');


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

        $select = $select->select('slots.fecha as fecha', 'slots.hora as hora', 'slots.direccion as direccion', 'conductors.puntoRecogida as recogida', 'rutas.localidad as localidad', 'coches.precioViaje as precio', 'coches.nombre as nombreCoche', 'conductors.apellido1 as apellido1', 'conductors.apellido2 as apellido2', 'conductors.nombre as nombre', 'rutas.universidad as uni', DB::raw('count(numAsiento) as asientos'))
        ->paginate(2);

        
        return view('pasajero.misreservas', ['result' => $select, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]);          
    }

    /*public function borrarHorario(Request $request) {
        $id_elegido = $request->query('id_elegido');

        Slot::destroy($id_elegido);

        return redirect('mishorarios');
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
    }*/

    public function confperfil(){
        $pasajero =  Pasajero::currentPasajero();
        return view('pasajero.configurarperfil', ['pasajero' => $pasajero]);
    }
}
