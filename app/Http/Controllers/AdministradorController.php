<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pasajero;

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
}
