<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pasajero;
use App\Conductor;
use App\User;
use App\Slot;
use App\Coche;
use Image;
use App\Ruta;

class AdministradorController extends Controller
{

    //////////////////////////////////////////////////////////////PASAJEROS//////////////////////////////////////////////////////////////////////////
    //te muestra la tabla de los pasajeros
    public function pasajeros(Request $request){

        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');
        $page = $request->query('page');

        $select = Pasajero::query();

        if(isset($sort)){
            if(isset($sort2) && ($sort === $sort2)){
                $sort = null;
                $select = $select->orderBy($sort2, 'desc');
            }
            else{
                $select = $select->orderBy($sort, 'asc');
            }
        }
        elseif(isset($sort2)) {
            $select = $select->orderBy($sort2, 'desc');
        }

        $select = $select->select('nombre', 'correo', 'fechaNacimiento', 'apellido1', 'apellido2', 'genero', 'telefono')->paginate(10);
        
        
        return view('administrador.pasajeros', ['result' => $select, 'page' => $page, 'sort' => $sort, 'sort2' => $sort2]);

    }

    public function borrarPasajero(Request $request){
        $correo = $request->query('correo');
        Pasajero::query()->where('correo', 'like', $correo)->delete();

        return redirect(action('AdministradorController@pasajeros'));
    }

    public function nuevoPasajero(Request $request){
        //select email from user where not in (select correo from pasajero)
        $users = User::query()->whereNotIn('email', Pasajero::query()->pluck('correo'))->select('email')->get();
        return view('administrador.nuevoPasajero', ['users' => $users]);
    }

    public function nuevoPasajero_crear(Request $request){
        
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string',
            'fechaNacimiento' => 'required|date', 
        ]);
        $nombre = $request->input('nombre');
        $correo = $request->input('correo');
        $fechaNacimiento = $request->input('fechaNacimiento');


        $apellido1 = $request->input('apellido1');
        if(isset($apellido1)){
            $request->validate(['apellido1' => 'required|string']);
        }

        $apellido2 = $request->input('apellido2');
        if(isset($apellido2)){
            $request->validate(['apellido2' => 'required|string']);
        }

        $genero = $request->input('genero');
        if(isset($fechaNacimiento)){
            $request->validate(['genero' => 'required|string']);
        }

        $telefono = $request->input('telefono');
        if(isset($telefono)){
            $request->validate(['telefono' => 'required|int']);
        }
        
        Pasajero::create(['correo' => $correo, 'nombre' => $nombre, 'fechaNacimiento' => $fechaNacimiento, 'genero' => $genero , 'telefono' => $telefono]);

        return redirect(action('AdministradorController@pasajeros'));
    }


    public function pasajero_modificar(Request $request){
        $correo = $request->query('correo');

        $pasajero = Pasajero::query()->where('correo', $correo)->first();
        return view('administrador.pasajero_modificar', ['pasajero' => $pasajero]);
    }

    public function pasajero_modificado(Request $request){ 
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

        return redirect(action('AdministradorController@pasajero_ver', ['correo' => $correo]));
    }

    public function pasajero_ver(Request $request){
        $correo = $request->query('correo');

        $pasajero = Pasajero::query()->where('correo', $correo)->first();
        return view('administrador.pasajero_ver', ['pasajero' => $pasajero]);
    }




    //////////////////////////////////////////////////////////////CONDUCTORES//////////////////////////////////////////////////////////////////////////
    public function conductores(Request $request){

        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');
        $page = $request->query('page');

        $select = Conductor::query()->join('rutas', 'ruta_id', 'id');

        if(isset($sort)){
            if(isset($sort2) && ($sort === $sort2)){
                $sort = null;
                $select = $select->orderBy($sort2, 'desc');
            }
            else{
                $select = $select->orderBy($sort, 'asc');
            }
        }
        elseif(isset($sort2)) {
            $select = $select->orderBy($sort2, 'desc');
        }

        $select = $select->select('nombre', 'correo', 'fechaNacimiento', 'apellido1', 'apellido2', 'genero', 'telefono', 'localidad', 'universidad', 'puntoRecogida')->paginate(10);
        
        
        return view('administrador.conductores', ['result' => $select, 'page' => $page, 'sort' => $sort, 'sort2' => $sort2]);

    }
    

    public function borrarConductor(Request $request){
        $correo = $request->query('correo');
        Conductor::query()->where('correo', 'like', $correo)->delete();

        return redirect(action('AdministradorController@conductores'));
    }


    public function nuevoConductor(Request $request){
        //select email from user where not in (select correo from Conductor)
        $users = User::query()->whereNotIn('email', Conductor::query()->pluck('correo'))->select('email')->get();
        return view('administrador.nuevoConductor', ['users' => $users]);
    }

    public function nuevoConductor_crear(Request $request){
        
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string',
            'fechaNacimiento' => 'required|date',
            'localidad' => 'required|string',
            'universidad' => 'required|string',
            'puntoRecogida' => 'required|string'
        ]);
        $nombre = $request->input('nombre');
        $correo = $request->input('correo');
        $fechaNacimiento = $request->input('fechaNacimiento');
        $localidad = $request->input('localidad');
        $universidad = $request->input('universidad');
        $puntoRecogida = $request->input('puntoRecogida');

        $ruta_posible = Ruta::query()->where('localidad', 'like', $localidad)
                                ->where('universidad', 'like', $universidad)->first();
        if(!isset($ruta_posible)){
            $ruta = Ruta::create(['localidad' => $localidad, 'universidad' => $universidad]);
        }
        else{
            $ruta = $ruta_posible;
        }

        $apellido1 = $request->input('apellido1');
        if(isset($apellido1)){
            $request->validate(['apellido1' => 'required|string']);
        }

        $apellido2 = $request->input('apellido2');
        if(isset($apellido2)){
            $request->validate(['apellido2' => 'required|string']);
        }

        $genero = $request->input('genero');
        if(isset($fechaNacimiento)){
            $request->validate(['genero' => 'required|string']);
        }

        $telefono = $request->input('telefono');
        if(isset($telefono)){
            $request->validate(['telefono' => 'required|int']);
        }
        
        Conductor::create(['correo' => $correo, 'nombre' => $nombre, 'fechaNacimiento' => $fechaNacimiento, 'genero' => $genero , 'telefono' => $telefono, 'ruta_id' => $ruta->id, 'puntoRecogida' => $puntoRecogida]);

        return redirect(action('AdministradorController@conductores'));
    }

    public function conductor_modificar(Request $request){
        $correo = $request->query('correo');
        $localidad = $request->query('localidad');
        $universidad = $request->query('universidad');
        $conductor = conductor::query()->where('correo', $correo)->first();
        return view('administrador.conductor_modificar', ['conductor' => $conductor, 'localidad' => $localidad, 'universidad' => $universidad]);
    }

    public function conductor_modificado(Request $request){ 
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string',
            'fechaNacimiento' => 'required|date',
            'localidad' => 'required|string',
            'universidad' => 'required|string',
            'puntoRecogida' => 'required|string'
        ]);
        $nombre = $request->input('nombre');
        $correo = $request->input('correo');
        $fechaNacimiento = $request->input('fechaNacimiento');
        $localidad = $request->input('localidad');
        $universidad = $request->input('universidad');
        $puntoRecogida = $request->input('puntoRecogida');

        $ruta_posible = Ruta::query()->where('localidad', 'like', $localidad)
                                ->where('universidad', 'like', $universidad)->first();
        if(!isset($ruta_posible)){
            $ruta = Ruta::create(['localidad' => $localidad, 'universidad' => $universidad]);
        }
        else{
            $ruta = $ruta_posible;
        }

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

        $conductor = conductor::query()->where('correo', $correo)->first();
        conductor::query()->where('correo', $correo)->update(['nombre' => $nombre, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'genero' => $genero, 'fechaNacimiento' => $fechaNacimiento, 'telefono' => $telefono, 'ruta_id' => $ruta->id, 'puntoRecogida' => $puntoRecogida]);

        $imagenOriginal = $request->file('imagen');
        if (isset($imagenOriginal)){
            $imagen = Image::make($imagenOriginal);
            $nombreImagen = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
            $imagen->resize(300,300);
            
            if(isset($conductor->rutaImagen) && file_exists(public_path() . '/images/' . $conductor->rutaImagen)){
                unlink(public_path() . '/images/' . $conductor->rutaImagen);
            }
            $imagen->save(public_path() . '/images/' . $nombreImagen, 100);

            conductor::query()->where('correo', $correo)->update(['rutaImagen' => $nombreImagen]);
        }

        return redirect(action('AdministradorController@conductor_ver', ['correo' => $correo]));
    }

    public function conductor_ver(Request $request){
        $correo = $request->query('correo');
        $localidad = $request->query('localidad');
        $universidad = $request->query('universidad');
        $conductor = Conductor::query()->where('correo', $correo)->first();
        
        return view('administrador.conductor_ver', ['conductor' => $conductor, 'localidad' => $localidad, 'universidad' => $universidad]);
    }


    ////////////////////////////////////////////////////////////USERS/////////////////////////////////////////////////////////////////////////////////
    public function users(Request $request){

        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');
        $page = $request->query('page');

        $select = User::query();

        if(isset($sort)){
            if(isset($sort2) && ($sort === $sort2)){
                $sort = null;
                $select = $select->orderBy($sort2, 'desc');
            }
            else{
                $select = $select->orderBy($sort, 'asc');
            }
        }
        elseif(isset($sort2)) {
            $select = $select->orderBy($sort2, 'desc');
        }

        $select = $select->select('email')->paginate(10);
        
        
        return view('administrador.users', ['result' => $select, 'page' => $page, 'sort' => $sort, 'sort2' => $sort2]);

    }

    public function borrarUser(Request $request){
        $email = $request->query('email');
        User::query()->where('email', 'like', $email)->delete();

        return redirect(action('AdministradorController@users'));
    }



    ////////////////////////////////////////////////////////////RUTAS/////////////////////////////////////////////////////////////////////////////////
    public function rutas(Request $request){

        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');
        $page = $request->query('page');

        $select = Ruta::query();

        if(isset($sort)){
            if(isset($sort2) && ($sort === $sort2)){
                $sort = null;
                $select = $select->orderBy($sort2, 'desc');
            }
            else{
                $select = $select->orderBy($sort, 'asc');
            }
        }
        elseif(isset($sort2)) {
            $select = $select->orderBy($sort2, 'desc');
        }

        $select = $select->select('id', 'localidad', 'universidad')->paginate(10);
        
        
        return view('administrador.rutas', ['result' => $select, 'page' => $page, 'sort' => $sort, 'sort2' => $sort2]);

    }

    public function borrarRuta(Request $request){
        $id = $request->query('id');
        Ruta::query()->where('id', 'like', $id)->delete();

        return redirect(action('AdministradorController@rutas'));
    }

    public function nuevaRuta(Request $request){
        
        
        return view('administrador.nuevaRuta');
    }

    public function nuevaRuta_crear(Request $request){
        
        $request->validate([
            'localidad' => 'required|string',
            'universidad' => 'required|string',
        ]);
        
        $localidad = $request->input('localidad');
        $universidad = $request->input('universidad');

        $ruta_posible = Ruta::query()->where('localidad', 'like', $localidad)
                                ->where('universidad', 'like', $universidad)->first();

        if(!isset($ruta_posible)){
            Ruta::create(['localidad' => $localidad, 'universidad' => $universidad]);
        }

        return redirect(action('AdministradorController@rutas'));
    }


    ////////////////////////////////////////////////////////////SLOTS/////////////////////////////////////////////////////////////////////////////////
    public function slots(Request $request){

        $sort = $request->query('sort');
        $sort2 = $request->query('sort2');
        $page = $request->query('page');

        $select = Slot::query();

        if(isset($sort)){
            if(isset($sort2) && ($sort === $sort2)){
                $sort = null;
                $select = $select->orderBy($sort2, 'desc');
            }
            else{
                $select = $select->orderBy($sort, 'asc');
            }
        }
        elseif(isset($sort2)) {
            $select = $select->orderBy($sort2, 'desc');
        }

        $select = $select->select('id', 'fecha', 'hora', 'direccion', 'coche_matricula')->paginate(10);
        
        
        return view('administrador.slots', ['result' => $select, 'page' => $page, 'sort' => $sort, 'sort2' => $sort2]);

    }

    public function borrarSlot(Request $request){
        $id = $request->query('id');
        Slot::query()->where('id', 'like', $id)->delete();

        return redirect(action('AdministradorController@slots'));
    }

    ////////////////////////////////////////////////////////////COCHES/////////////////////////////////////////////////////////////////////////////////


}
