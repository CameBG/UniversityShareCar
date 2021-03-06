<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Conductor;
use App\Coche;
use App\Pasajero;
use App\Slot;
use App\LineaSlot;
use App\Ruta;
use Image;
use App\ServiceLayer\PlazasLineasSlot;
use App\ServiceLayer\Rutas;

class ConductorController extends Controller
{
    public function misHorarios(Request $request){

        $user = Auth::user();
        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');
        $page = $request->query('page');

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
                ->where('conductors.correo', $user->email)
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

        if(isset($fechaDesde) && isset($fechaHasta)){
            $select = $select->whereBetween('slots.fecha', [$fechaDesde, $fechaHasta]);
        } 
        elseif (isset($fechaDesde)){
            $select = $select->where('slots.fecha', '>=' , $fechaDesde);
        }
        elseif (isset($fechaHasta)){
            $select = $select->where('slots.fecha', '<=' , $fechaHasta);
        }

        $select = $select->select('coches.nombre as nombreCoche', 'coches.plazas as plazas', 'slots.fecha as fecha', 'slots.hora as hora', 'slots.direccion as direccion', 'slots.id as id_elegido', DB::raw('count(pasajeros.correo) as asientos') )
        ->paginate(2);

        return view('conductor.mishorarios', ['result' => $select, 'page' => $page, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde' => $fechaDesde, 'fechaHasta' => $fechaHasta]);          
    }

    public function borrarHorario(Request $request) {
        $id_elegido = $request->query('id_elegido');
        Slot::destroy($id_elegido);

        return redirect(action('ConductorController@misHorarios'));
    }
    
    public function nuevoHorario(Request $request){
        $user = Auth::user();
        
        $conductor = Conductor::query()->where('correo', $user->email)->first();
        $coches = $conductor->coches()->get();

        return view('conductor.nuevohorario', ['coches' => $coches]);
    }

    public function nuevoHorario_crear(Request $request){
        $request->validate(['fecha' => 'required|date',
                            'hora' => 'required|date_format:H:i',
                            'direccion' => 'required',
                            'coche' => 'required']);

        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $direccion = $request->input('direccion');
        $coche = $request->input('coche');

        PlazasLineasSlot::crearSlot($fecha, $hora, $direccion, $coche);

        return redirect(action('ConductorController@misHorarios'));
    }

    public function coches(Request $request){
        $user = Auth::user();

        $page = $request->input('page');
        $coches = Coche::query()->join('conductors', 'coches.conductor_correo', 'conductors.correo')
                ->where('conductors.correo', $user->email)
                ->orderBy('coches.nombre', 'asc')
                ->select('coches.nombre as nombreCoche', 'matricula', 'marca', 'modelo', 'plazas', 'precioViaje', 'coches.rutaImagen as rutaImagen')->paginate(1);

        return view('conductor.coches', ['coches' => $coches, 'page' => $page]);
    }

    public function coches_borrar(Request $request){
        $matricula = $request->input('matricula');
        if(isset($matricula)){
            $coche = Coche::query()->where('matricula', $matricula)->first();
            if(isset($coche->rutaImagen) && file_exists(public_path() . '/images/' . $coche->rutaImagen)){
                unlink(public_path() . '/images/' . $coche->rutaImagen);
            }
            Coche::query()->where('matricula', $matricula)->delete();
        }

        return redirect(action('ConductorController@coches'));
    }

    public function coches_crear(Request $request){
        return view('conductor.coches_crear');
    }

    public function coches_creado(Request $request){
        $user = Auth::user();

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
        $correo =  $user->email;

        Coche::create(['matricula' => $matricula, 'nombre' => $nombre, 'marca' => $marca, 'modelo' => $modelo, 'plazas' => $plazas, 'precioViaje' => $precio, 'conductor_correo' => $correo]);

        $imagenOriginal = $request->file('imagen');
        if (isset($imagenOriginal)){
            $imagen = Image::make($imagenOriginal);
            $nombreImagen = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
            $imagen->resize(300,300);
            $imagen->save(public_path() . '/images/' . $nombreImagen, 100);

            Coche::query()->where('matricula', $matricula)->update(['rutaImagen' => $nombreImagen]);
        }

        return redirect(action('ConductorController@coches'));
    }

    public function coches_modificar(Request $request){
        $page = $request->query('page');
        $matricula = $request->query('matricula');

        $coche = Coche::query()->where('matricula', $matricula)->first();
        if (isset($coche)){
            return view('conductor.coches_modificar', ['coche' => $coche, 'page' => $page]);
        }
        else{
            return redirect(action('ConductorController@coches', ['page' => $page]));
        }
    }

    public function coches_modificado(Request $request){
        $user = Auth::user();

        $page = $request->query('page');

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
        

        $correo =  $user->email;
        $coche = Coche::query()->where('matricula', $matricula)->first();
        $plazasAntigua = $coche->plazas;

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
        
        PlazasLineasSlot::editarPlazas($plazas, $plazasAntigua, $matricula);

        Coche::query()->where('matricula', $matricula)->update(['nombre' => $nombre, 'marca' => $marca, 'modelo' => $modelo, 'precioViaje' => $precio]);
        return redirect(action('ConductorController@coches', ['page' => $page]));
    }

    public function pasajeros(Request $request){
        $user = Auth::user();

        $fechaDesde = $request->input('fechaDesde');
        if (isset($fechaDesde)){
            $request->validate([
                'fechaDesde' => 'required|date'
            ]);
        }

        $fechaHasta = $request->input('fechaHasta');
        if (isset($fechaHasta)){
            $request->validate(['fechaHasta' => 'required|date']);
        }

        $personaElegida = $request->input('personaElegida');
        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');
        $page = $request->query('page');
        $cocheElegido = $request->query('cocheElegido');

        $coches = Conductor::query()
                        ->join('coches', 'conductors.correo', 'coches.conductor_correo')
                        ->where('conductors.correo', $user->email)
                        ->select('coches.nombre as nombreCoche')->get();

        $filas = Conductor::query()
            ->join('coches', 'conductors.correo', 'coches.conductor_correo')
            ->join('slots', 'coches.matricula', 'slots.coche_matricula')
            ->join('lineaSlots', 'slots.id', 'lineaSlots.slot_id')
            ->join('pasajeros', 'lineaSlots.pasajero_correo', 'pasajeros.correo')
            ->where('conductors.correo', $user->email);

        if(isset($personaElegida)){
            $filas = $filas->where('pasajeros.nombre', 'like', '%'.$personaElegida.'%');
        }

        if(isset($cocheElegido)){
            $filas = $filas->where('coches.nombre', $cocheElegido);
        }

        if(isset($fechaDesde) && isset($fechaHasta)){
            $filas = $filas->whereBetween('slots.fecha', [$fechaDesde, $fechaHasta]);
        } 
        elseif (isset($fechaDesde)){
            $filas = $filas->where('slots.fecha', '>=' , $fechaDesde);
        }
        elseif (isset($fechaHasta)){
            $filas = $filas->where('slots.fecha', '<=' , $fechaHasta);
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

        return view('conductor.pasajeros', ['page' => $page, 'filas' => $filas, 'coches' => $coches, 'sort' => $sort, 'sort2' => $sort2, 'personaElegida' => $personaElegida, 'cocheElegido' => $cocheElegido, 'fechaDesde' => $fechaDesde, 'fechaHasta' => $fechaHasta]);
    }

    public function confperfil(){
        $user = Auth::user();
        $conductor =  Conductor::query()->where('correo', $user->email)->first();
        return view('conductor.configurarperfil', ['conductor' => $conductor]);
    }

    public function perfil_borrar(Request $request){
        $correo = Auth::user()->email;

        $conductor = Conductor::query()->where('correo', $correo)->first();
        $ruta = Ruta::query()->where('id', $conductor->ruta_id)->first();

        // Borrar imagen
        if(isset($conductor->rutaImagen) && file_exists(public_path() . '/images/' . $conductor->rutaImagen)){
            unlink(public_path() . '/images/' . $conductor->rutaImagen);
        }

        // Borrar conductor
        if(isset($correo)){
            Conductor::query()->where('correo', $correo)->delete();
        }

        // Borrar ruta si no la utiliza nadie
        Rutas::borrarRutaSiNoUsada($ruta);
        
        return redirect("/");
    }

    public function perfil_modificar(Request $request){
        $correo = Auth::user()->email;

        $conductor = Conductor::query()->where('correo', $correo)->first();
        return view('conductor.configurarperfil_modificar', ['conductor' => $conductor]);
    }

    public function perfil_modificado(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'fechaNacimiento' => 'required|date',
        ]);

        $correo = Auth::user()->email;
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
        $user = Auth::user();
        $conductor =  Conductor::query()->where('correo', $user->email)->first();
        return view('conductor.ruta', ['conductor' => $conductor]);
    }

    public function ruta_modificar(Request $request){
        $correo = Auth::user()->email;
        $conductor = Conductor::query()->where('correo', $correo)->first();        
        return view('conductor.ruta_modificar', ['conductor' => $conductor]);
    }

    public function ruta_modificada(Request $request){
        $user = Auth::user();

        $request->validate([
            'localidad' => 'required|string',
            'universidad' => 'required|string'
        ]);
        
        $correo = $user->email;
        $localidad = $request->input('localidad');
        $universidad = $request->input('universidad');
        $puntoRecogida = $request->input('puntoRecogida');

        $conductor = Conductor::query()->where('correo', $correo)->first();

        Rutas::editarRuta($correo, $localidad, $universidad, $puntoRecogida);
        
        return redirect(action('ConductorController@ruta', ['conductor' => $conductor]));
    }
    
}
