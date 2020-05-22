<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ruta;
use App\Conductor;
use App\Admin;
use App\Pasajero;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function elegir() {
        $user = Auth::user();
        $existe_admin = Admin::where('email', $user->email)->exists();
        $existe_pasajero = Pasajero::where('correo', $user->email)->exists();
        $existe_conductor = Conductor::where('correo', $user->email)->exists();
        return view('index', compact(['user', 'existe_conductor', 'existe_pasajero', 'existe_admin']));
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

        return redirect('/conductor');
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

        return redirect('/pasajero');
    }

}
