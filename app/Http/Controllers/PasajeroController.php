<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

use App\Pasajero;
use App\Slot;
use App\LineaSlot;
use App\Ruta;
use Image;


class PasajeroController extends Controller
{
    public function buscarViajes(Request $request) {
        $reservado = $request->input('reservado');
        $page = $request->query('page');
        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');

        $dia = $request->input('dia');
        if (isset($dia)){
            $request->validate(['dia' => 'required|date']);
        }

        $horaDesde = $request->input('horaDesde');
        if(isset($horaDesde)){
            $request->validate(['horaDesde' => 'required|date_format:H:i']);
        }

        $horaHasta = $request->input('horaHasta');
        if(isset($horaHasta)){
            $request->validate(['horaHasta' => 'required|date_format:H:i']);
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

        $localidades = Ruta::query()->select('localidad')->groupBy('localidad')->orderBy('localidad', 'asc')->get();
        $universidades = Ruta::query()->select('universidad')->groupBy('universidad')->orderBy('universidad', 'asc')->get();
        
        $select = LineaSlot::query()->where('lineaSlots.pasajero_correo', null)        
                ->join('slots', 'lineaSlots.slot_id', 'slots.id') 
                ->join('coches', 'slots.coche_matricula', 'coches.matricula')
                ->join('conductors', 'coches.conductor_correo', 'conductors.correo')
                ->join('rutas', 'conductors.ruta_id', 'rutas.id')
                ->groupBy('slots.fecha', 'slots.hora', 'slots.direccion', 'conductors.puntoRecogida', 'rutas.localidad', 
                          'coches.precioViaje', 'coches.nombre', 'conductors.apellido1', 'conductors.apellido2', 'conductors.nombre', 
                          'rutas.universidad', 'lineaSlots.slot_id', 'coches.plazas','lineaSlots.slot_id');

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

        if(isset($horaDesde) && isset($horaHasta)){
            $select = $select->whereBetween('slots.hora', [$horaDesde, $horaHasta]);
        } else if (isset($horaDesde)){
            $select = $select->where('slots.hora', '>=', [$horaDesde]);
        } else if (isset($horaHasta)){
            $select = $select->where('slots.hora', '<=', [$horaHasta]);
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
                                  'conductors.nombre as nombre', 'rutas.universidad as uni', 'coches.plazas as plazas',
                                  'lineaSlots.slot_id as slot_id', DB::raw('count(numAsiento) as asientos'))->paginate(4);

        return view('pasajero.buscarViajes', ['result' => $select, 'page' => $page, 'sort' => $sort, 'sort2' => $sort2, 'localidades' => $localidades, 'universidades' => $universidades, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta, 'reservado' => $reservado]);
    }
    
    public function reservarViaje(Request $request) {
        $request->validate([
            'reservas' => 'required|numeric',
        ]);

        $reservas = $request->input('reservas');
        $slot_id = $request->input('slot_id');
        $pasajero_correo = Auth::user()->email;

        $asientosLibres = LineaSlot::query()->where('slot_id', $slot_id)->where('pasajero_correo', null)->groupBy('slot_id')->select(DB::raw('count(*) as asientos'))->first()->asientos;

        if ($asientosLibres < $reservas){
            $reservado = "Tiene " . $asientosLibres . " reservas y quiere cancelar " . $reservas . ". Operación denegada, no puede cancelar más reservas de las que tiene.";
            
        } else if ($reservas > 0) {
            for($i = 0; $i < $reservas; $i++){
                $numAsiento = LineaSlot::query()->where('slot_id', $slot_id)->where('pasajero_correo', null)->first()->numAsiento;
                LineaSlot::query()->where('slot_id', $slot_id)->where('numAsiento', $numAsiento)->update(['pasajero_correo' => $pasajero_correo]);
            }
            $reservado = "Se ha reservado con éxito " . $reservas . " reservas de las selección escogida.";
        } else {
            $reservado = $reservas . " no es un número válido para cancelar reservas.";
        }

        $request->request->add(['reservado' => $reservado]);
        return $this->buscarViajes($request);
    }

    public function misReservas(Request $request){
        $user = Auth::user();

        $borrado = $request->input('id_reserva');
        $page = $request->query('page');
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
                ->where('pasajeros.correo', $user->email)
                ->groupBy('slots.fecha', 'slots.hora', 'slots.direccion', 'conductors.puntoRecogida', 'rutas.localidad', 'coches.precioViaje', 'coches.nombre',
                          'conductors.apellido1', 'conductors.apellido2', 'conductors.nombre', 'rutas.universidad', 'lineaSlots.slot_id', 'lineaSlots.pasajero_correo');


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
        } else if (isset($fechaDesde)){
            $select = $select->where('slots.fecha', '>=', [$fechaDesde]);
        } else if (isset($fechaHasta)){
            $select = $select->where('slots.fecha', '<=', [$fechaHasta]);
        }

        if(isset($personaElegida)){
            $select = $select->where('conductors.nombre', 'like', '%'.$personaElegida.'%');
        }

        $select = $select->select('slots.fecha as fecha', 'slots.hora as hora', 'slots.direccion as direccion', 'conductors.puntoRecogida as recogida',
                                  'rutas.localidad as localidad', 'coches.precioViaje as precio', 'coches.nombre as nombreCoche', 'conductors.apellido1 as apellido1',
                                  'conductors.apellido2 as apellido2', 'conductors.nombre as nombre', 'rutas.universidad as uni', 'lineaSlots.slot_id as id_reserva',
                                  'lineaSlots.pasajero_correo as correo_reserva', DB::raw('count(numAsiento) as asientos'))->paginate(4);

        
        return view('pasajero.misreservas', ['result' => $select, 'page' => $page, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida' => $personaElegida, 'borrado' => $borrado]);
    }

    public function eliminarReserva(Request $request){
        $request->validate([
            'cancelaciones' => 'required|numeric',
        ]);

        $cancelaciones = $request->input('cancelaciones');
        $id_reserva = $request->query('id_reserva');
        $correo_reserva = Auth::user()->email;

        // Cantidad de reservas actuales
        $cantidad = LineaSlot::query()->where('slot_id', $id_reserva)->where('pasajero_correo', $correo_reserva)->groupBy('slot_id', 'pasajero_correo')->select(DB::raw('count(*) as asientos'))->first()->asientos;
        $cantidadTotal = LineaSlot::query()->where('slot_id', $id_reserva)->groupBy('slot_id')->select(DB::raw('count(*) as asientos'))->first()->asientos;
        
        if ($cantidad < $cancelaciones){
            $borrado = "Tiene " . $cantidad . " reservas y quiere cancelar " . $cancelaciones . ". Operación denegada, no puede cancelar más reservas de las que tiene.";
            
        } else if ($cancelaciones > 0) {
            for($i = 0; $i < $cancelaciones; $i++){
                $asientoParaBorrar = LineaSlot::query()->where('slot_id', $id_reserva)->where('pasajero_correo', $correo_reserva)->first()->numAsiento; // Primer asiento del correo_reserva
    
                // Por cada iteración, cambiamos el pasajero del asiento siguiente, al asiento actual.
                for($j = $asientoParaBorrar; $j < $cantidadTotal; $j++){
                    $correoSiguientePasajero = LineaSlot::query()->where('slot_id', $id_reserva)->where('numAsiento', $j + 1)->first()->pasajero_correo;
                    LineaSlot::query()->where('slot_id', $id_reserva)->where('numAsiento', $j)->update(['pasajero_correo' => $correoSiguientePasajero]);
                }
                // Después de la última iteración, el último asiento es el que se queda en nulo.
                LineaSlot::query()->where('slot_id', $id_reserva)->where('numAsiento', $j)->update(['pasajero_correo' => null]);
            }
            $borrado = "Se ha borrado con éxito " . $cancelaciones . " reservas de las selección escogida.";
        } else {
            $borrado = $cancelaciones . " no es un número válido para cancelar reservas.";
        }
        
        $request->request->add(['borrado' => $borrado]);
        return $this->misReservas($request);
    }

    public function confperfil(){
        $user = Auth::user();

        $pasajero =  Pasajero::query()->where('correo', $user->email)->first();;
        return view('pasajero.configurarperfil', ['pasajero' => $pasajero]);
    }

    public function perfil_borrar(Request $request){
        $correo = Auth::user()->email;
        $pasajero = Pasajero::query()->where('correo', $correo)->first();

        // Borrar imagen
        if(isset($pasajero->rutaImagen) && file_exists(public_path() . '/images/' . $pasajero->rutaImagen)){
            unlink(public_path() . '/images/' . $pasajero->rutaImagen);
        }

        if(isset($correo)){
            Pasajero::query()->where('correo', $correo)->delete();
        }

        return redirect("/");
    }

    public function perfil_modificar(Request $request){
        $correo = Auth::user()->email;

        $pasajero = Pasajero::query()->where('correo', $correo)->first();
        return view('pasajero.configurarperfil_modificar', ['pasajero' => $pasajero]);
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

        $pasajero = Pasajero::query()->where('correo', $correo)->first();
        Pasajero::query()->where('correo', $correo)->update(['nombre' => $nombre, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'genero' => $genero, 'fechaNacimiento' => $fechaNacimiento, 'telefono' => $telefono]);

        $imagenOriginal = $request->file('imagen');
        if (isset($imagenOriginal)){
            $imagen = Image::make($imagenOriginal);
            $nombreImagen = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
            $imagen->resize(300,300);
            
            if(isset($pasajero->rutaImagen) && file_exists(public_path() . '/images/' . $pasajero->rutaImagen)){
                unlink(public_path() . '/images/' . $pasajero->rutaImagen);
            }
            $imagen->save(public_path() . '/images/' . $nombreImagen, 100);

            Pasajero::query()->where('correo', $correo)->update(['rutaImagen' => $nombreImagen]);
        }

        return redirect(action('PasajeroController@confperfil', ['pasajero' => $pasajero]));
    }
}
