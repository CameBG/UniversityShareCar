<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Conductor;
use App\Coche;
use App\Pasajero;
use App\Slot;
use App\LineaSlot;
use App\Ruta;
use Image;

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
                ->groupBy('coches.nombre', 'coches.marca', 'coches.modelo', 'slots.fecha', 'slots.hora', 'slots.direccion', 'coches.plazas', 'slots.id');


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

        $select = $select->select('coches.nombre as nombreCoche', 'coches.plazas as plazas', 'slots.fecha as fecha', 'slots.hora as hora', 'slots.direccion as direccion', 'slots.id as id_elegido', DB::raw('count(pasajeros.correo) as asientos') )
        ->paginate(2);

        
        return view('conductor.mishorarios', ['result' => $select, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde' => $fechaDesde, 'fechaHasta' => $fechaHasta]);          
    }

    public function borrarHorario(Request $request) {
        $id_elegido = $request->query('id_elegido');

        Slot::destroy($id_elegido);

        return redirect(action('ConductorController@misHorarios'));
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

        return redirect(action('ConductorController@misHorarios'));
    }
    
    public function nuevoHorario(Request $request){
        $coches = Conductor::currentConductor()->coches()->get();
        return view('conductor.nuevohorario', ['coches' => $coches]);
    }

    public function coches(){
        $coches = Coche::query()->join('conductors', 'coches.conductor_correo', 'conductors.correo')
                ->where('conductors.correo', Conductor::currentConductor()->correo)
                ->orderBy('coches.nombre', 'asc')
                ->select('coches.nombre as nombreCoche', 'matricula', 'marca', 'modelo', 'plazas', 'precioViaje', 'coches.rutaImagen as rutaImagen')->paginate(1);

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

        $coche = Coche::query()->where('matricula', $matricula)->first();
        if (isset($coche)){
            return view('conductor.coches_modificar', ['coche' => $coche]);
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
        $coche = Coche::query()->where('matricula', $matricula)->first();
        Coche::query()->where('matricula', $matricula)->update(['matricula' => $matricula, 'nombre' => $nombre, 'marca' => $marca, 'modelo' => $modelo, 'plazas' => $plazas, 'precioViaje' => $precio, 'conductor_correo' => $correo]);

        $imagenOriginal = $request->file('imagen');
        if (isset($imagenOriginal)){
            $imagen = Image::make($imagenOriginal);
            $nombreImagen = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
            $imagen->resize(300,300);
            
            if(isset($coche->rutaImagen) && file_exists(public_path() . '/images/' . $coche->rutaImagen)){
                unlink(public_path() . '/images/' . $coche->rutaImagen);
            }
            $imagen->save(public_path() . '/images/' . $nombreImagen, 100);

            Coche::query()->where('matricula', $matricula)->update(['rutaImagen' => $nombreImagen]);
        }

        return redirect(action('ConductorController@coches'));
    }

    public function confperfil(){
        $conductor =  Conductor::currentConductor();
        return view('conductor.configurarperfil', ['conductor' => $conductor]);
    }

    public function perfil_borrar(Request $request){
        $correo = $request->query('correo');
        if(isset($correo)){
            Conductor::query()->where('correo', $correo)->delete();
        }

        return redirect(action('ConductorController@confperfil'));
    }

    public function perfil_modificar(Request $request){
        $correo = $request->query('correo');

        $conductor = Conductor::query()->where('correo', $correo)->first();
        return view('conductor.configurarperfil_modificar', ['conductor' => $conductor]);
    }

    public function perfil_modificado(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'fechaNacimiento' => 'required|date',
        ]);

        $correo = $request->query('correo');
        $nombre = $request->input('nombre');
        $apellido1 = $request->input('apellido1');
        $apellido2 = $request->input('apellido2');
        $genero = $request->input('genero');
        $fechaNacimiento = $request->input('fechaNacimiento');
        $telefono = $request->input('telefono');

        if (isset($telefono)){
            $request->validate([
                'telefono' => 'required|numeric'
            ]);
        }

        $conductor = Conductor::query()->where('correo', $correo)->first();
        Conductor::query()->where('correo', $correo)->update(['nombre' => $nombre, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'genero' => $genero, 'fechaNacimiento' => $fechaNacimiento, 'telefono' => $telefono]);

        $imagenOriginal = $request->file('imagen');
        if (isset($imagenOriginal)){
            $imagen = Image::make($imagenOriginal);
            $nombreImagen = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
            $imagen->resize(300,300);
            
            if(isset($conductor->rutaImagen) && file_exists(public_path() . '/images/' . $conductor->rutaImagen)){
                unlink(public_path() . '/images/' . $conductor->rutaImagen);
            }
            $imagen->save(public_path() . '/images/' . $nombreImagen, 100);

            Conductor::query()->where('correo', $correo)->update(['rutaImagen' => $nombreImagen]);
        }

        return redirect(action('ConductorController@confperfil', ['conductor' => $conductor]));
    }

    /*
    Ah bueno, ahi nos referimos a que para el usuario visualmente lo está editando,
    para él sí está editando, pero lo que pasa realmente es que se le asigna otra
    ruta en la base de datos, la que él ponga (si no existe se crea nueva, y la
    ruta antigua, si nadie mas la está utilizando, se borra de la base de datos)
    */
    public function ruta() {
        $conductor =  Conductor::currentConductor();
        return view('conductor.ruta', ['conductor' => $conductor]);
    }

    public function ruta_modificar(Request $request){
        $correo = $request->query('correo');
        $conductor = Conductor::query()->where('correo', $correo)->first();        
        return view('conductor.ruta_modificar', ['conductor' => $conductor]);
    }
    public function ruta_modificada(Request $request){
        $request->validate([
            'localidad' => 'required|string',
            'universidad' => 'required|string'
        ]);
        
        $correo = $request->query('correo');
        $conductor = Conductor::query()->where('correo', $correo)->first();

        $localidad = $request->input('localidad');
        $universidad = $request->input('universidad');
        $puntoRecogida = $request->input('puntoRecogida');

        $ruta = Ruta::query()->where('localidad','like', $localidad)
                             ->where('universidad','like', $universidad)->first();
        if(is_null($ruta)){
            $ruta2 = Ruta::create(['localidad' => $localidad, 'universidad' => $universidad]);
            Conductor::query()->where('correo', $correo)->update(['ruta_id' => $ruta2->id, 'puntoRecogida' => $puntoRecogida]);
            
        }
        else{
            //borrar
            $slots = Slot::query()->join('coches', 'coche_matricula', 'coches.matricula')
                              ->join('conductors', 'coches.conductor_correo', 'conductors.correo')             
                              ->where('conductors.correo', Conductor::currentConductor()->correo)->delete();
            //darle esta ruta al conductor
            Conductor::query()->where('correo', $correo)->update(['ruta_id' => $ruta->id, 'puntoRecogida' => $puntoRecogida]);
            
        }
        
        return redirect(action('ConductorController@ruta', ['conductor' => $conductor]));
    }
    
}
