<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pasajero;
use App\User;
use Image;

class AdministradorController extends Controller
{
    //
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

        return redirect(action('AdministradorController@pasajeros'));
    }
    
}
