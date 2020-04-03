<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Conductor;
use App\Coche;

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

    public function coches(){
        $coches = Coche::query()->join('conductors', 'coches.conductor_correo', 'conductors.correo')
                ->where('conductors.correo', Conductor::currentConductor()->correo)
                ->orderBy('coches.nombre', 'asc')
                ->select('coches.nombre as nombreCoche', 'matricula', 'marca', 'modelo', 'plazas', 'precioViaje', 'coches.rutaImagen as imagenCoche')->paginate(1);

        return view('conductor.coches', ['coches' => $coches]);
    }

    public function coches_borrar(Request $request){
        $matricula = $request->input('matricula');
        if(isset($matricula)){
            Coche::query()->where('matricula', $matricula)->delete();
        }

        return redirect(action('ConductorController@coches'));
    }

    public function coches_crear(Request $request){
        return view('conductor.coches_crear');
    }

    public function coches_creado(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'matricula' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'plazas' => 'required|integer',
            'precio' => 'required|numeric|gt:0' 
        ]);

        $nombre = $request->input('nombre');
        $matricula = $request->input('matricula');
        $marca = $request->input('marca');
        $modelo = $request->input('modelo');
        $plazas = $request->input('plazas');
        $precio = $request->input('precio');
        $correo =  Conductor::currentConductor()->correo;

        Coche::create(['matricula' => $matricula, 'nombre' => $nombre, 'marca' => $marca, 'modelo' => $modelo, 'plazas' => $plazas, 'precioViaje' => $precio, 'conductor_correo' => $correo]);

        return redirect(action('ConductorController@coches'));
    }

    public function coches_modificar(Request $request){
        $matricula = $request->query('matricula');
        $imagenCoche = $request->query('imagenCoche');

        $coche = Coche::query()->where('matricula', $matricula)->first();
        if (isset($coche)){
            return view('conductor.coches_modificar', ['coche' => $coche, 'matricula' => $matricula, 'imagenCoche' => $imagenCoche]);
        }
        else{
            return redirect(action('ConductorController@coches'));
        }
    }

    public function coches_modificado(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'plazas' => 'required|integer',
            'precio' => 'required|numeric|gt:0' 
        ]);

        $matricula = $request->query('matricula');

        $nombre = $request->input('nombre');
        $marca = $request->input('marca');
        $modelo = $request->input('modelo');
        $plazas = $request->input('plazas');
        $precio = $request->input('precio');
        $correo =  Conductor::currentConductor()->correo;

        
        Coche::query()->where('matricula', $matricula)->update(['matricula' => $matricula, 'nombre' => $nombre, 'marca' => $marca, 'modelo' => $modelo, 'plazas' => $plazas, 'precioViaje' => $precio, 'conductor_correo' => $correo]);

        return redirect(action('ConductorController@coches'));
    }
}
