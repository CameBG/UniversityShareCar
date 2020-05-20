<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Pasajero;
use App\LineaSlot;

class PasajeroController extends Controller
{
    public function misReservas(Request $request){
        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');

        $personaElegida = $request->input('personaElegida');

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
        if(isset($personaElegida)){
            $select = $select->where('conductors.nombre', 'like', '%'.$personaElegida.'%');
        }

        $select = $select->select('slots.fecha as fecha', 'slots.hora as hora', 'slots.direccion as direccion', 'conductors.puntoRecogida as recogida', 'rutas.localidad as localidad', 'coches.precioViaje as precio', 'coches.nombre as nombreCoche', 'conductors.apellido1 as apellido1', 'conductors.apellido2 as apellido2', 'conductors.nombre as nombre', 'rutas.universidad as uni', DB::raw('count(numAsiento) as asientos'))
        ->paginate(4);

        
        return view('pasajero.misreservas', ['result' => $select, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida' => $personaElegida]);          
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

    public function perfil_borrar(Request $request){
        $correo = $request->query('correo');
        if(isset($correo)){
            Pasajero::query()->where('correo', $correo)->delete();
        }

        return redirect(action('PasajeroController@confperfil'));
    }

    public function perfil_modificar(Request $request){
        $correo = $request->query('correo');

        $pasajero = Pasajero::query()->where('correo', $correo)->first();
        return view('pasajero.configurarperfil_modificar', ['pasajero' => $pasajero]);
    }

    public function perfil_modificado(Request $request){
        /* apellido1, apellido2, genero ...
        if (isset($fechaElegida)){
            $request->validate([
                'fechaElegida' => 'required|date'
            ]);
        }*/
        $request->validate([
            'nombre' => 'required|string',
            'fechaNacimiento' => 'required|date'
        ]);

        $correo = $request->query('correo');

        $nombre = $request->input('nombre');
        $apellido1 = $request->input('apellido1');
        $apellido2 = $request->input('apellido2');
        $genero = $request->input('genero');
        $fechaNacimiento = $request->input('fechaNacimiento');
        $telefono = $request->input('telefono');

        $pasajero = Pasajero::query()->where('correo', $correo)->first();
        
        Pasajero::query()->where('correo', $correo)->update(['nombre' => $nombre, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'genero' => $genero, 'fechaNacimiento' => $fechaNacimiento, 'telefono' => $telefono]);

        return redirect(action('PasajeroController@confperfil', ['pasajero' => $pasajero]));
    }

    public function buscarViajes(Request $request) {
        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');

        $dia = $request->input('dia');
        if (isset($dia)){
            $request->validate(['dia' => 'required|date']);
        }
        $horaDesde = $request->input('horaDesde');
        if(isset($horaDesde)){
            $request->validate(['horaDesde' => 'required|string']);
        }
        $horaHasta = $request->input('horaHasta');
        if(isset($horaHasta)){
            $request->validate(['horaHasta' => 'required|string']);
        }
        $localidad = $request->input('localidad');
        if (isset($localidad)) {
            $request->validate(['localidad' => 'required|string']);
        }
        $universidad = $request->input('universidad');
        if (isset($universidad)) {
            $request->validate(['universidad' => 'required|string']);
        }
        $direccion = $request->input('direccion');
        if (isset($direccion)) {
            $request->validate(['direccion' => 'required|string']);
        }
        $select = LineaSlot::query()->where('lineaSlots.pasajero_correo', null)        
                ->join('slots', 'lineaSlots.slot_id', 'slots.id') 
                ->join('coches', 'slots.coche_matricula', 'coches.matricula')
                ->join('conductors', 'coches.conductor_correo', 'conductors.correo')
                ->join('rutas', 'conductors.ruta_id', 'rutas.id')
                ->groupBy('slots.fecha', 'slots.hora', 'slots.direccion', 'conductors.puntoRecogida', 'rutas.localidad', 
                          'coches.precioViaje', 'coches.nombre', 'conductors.apellido1', 'conductors.apellido2', 'conductors.nombre', 
                          'rutas.universidad', 'lineaSlots.slot_id', 'coches.plazas');

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
        
        if(isset($dia)){
            $select = $select->where('slots.fecha', '=', $dia);
        }
        /*if(isset($horaDesde)){
            $select = $select->where('slots.hora', '=', $horaDesde);
        }*/
        if(isset($horaDesde)){
            if(isset($horaHasta)){
                $select = $select->whereBetween('slots.hora', [$horaDesde, $horaHasta]);
            }
        }
        if(isset($localidad)){
            $select = $select->where('rutas.localidad', 'like', '%'.$localidad.'%');
        }
        if(isset($universidad)){
            $select = $select->where('rutas.universidad', 'like', '%'.$universidad.'%');
        }
        if(isset($direccion)){
            if($direccion != 'ambas') {
                $select = $select->where('slots.direccion', 'like', '%'.$direccion.'%');
            }
        }

        $select = $select->select('slots.fecha as fecha', 'slots.hora as hora', 'slots.direccion as direccion', 
                                  'conductors.puntoRecogida as recogida', 'rutas.localidad as localidad', 'coches.precioViaje as precio', 
                                  'coches.nombre as nombreCoche', 'conductors.apellido1 as apellido1', 'conductors.apellido2 as apellido2',
                                  'conductors.nombre as nombre', 'rutas.universidad as uni', 'coches.plazas as plazas', DB::raw('count(numAsiento) as asientos'))->paginate(4);

        return view('pasajero.buscarViajes', ['result' => $select, 'sort' => $sort, 'sort2' => $sort2, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]);
    }
}
