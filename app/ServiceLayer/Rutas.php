<?php
namespace App\ServiceLayer;
use Illuminate\Support\Facades\DB;
use App\Slot;
use App\Conductor;
use App\Ruta;

class Rutas {
    public static function editarRuta($correo, $localidad, $universidad, $puntoRecogida){
        DB::transaction(function() use ($correo, $localidad, $universidad, $puntoRecogida){
            $ruta = Ruta::query()->where('localidad','like', $localidad)
                                ->where('universidad','like', $universidad)->first();

            $ruta_idAnt = Conductor::query()->where('correo', $correo)->first()->ruta_id;
            $rutaAntigua = Ruta::query()->where('id', $ruta_idAnt)->first();
            
            if(is_null($ruta)){
                $ruta2 = Ruta::create(['localidad' => $localidad, 'universidad' => $universidad]);
                Conductor::query()->where('correo', $correo)->update(['ruta_id' => $ruta2->id, 'puntoRecogida' => $puntoRecogida]);
            }
            else{
                //borrar
                Slot::query()->join('coches', 'coche_matricula', 'coches.matricula')
                            ->join('conductors', 'coches.conductor_correo', 'conductors.correo')             
                            ->where('conductors.correo', $correo)->delete();
                //darle esta ruta al conductor
                Conductor::query()->where('correo', $correo)->update(['ruta_id' => $ruta->id, 'puntoRecogida' => $puntoRecogida]);
            }
            //si no hay ningun conductor asociado a la ruta que se utilizaba antes se borra.
            $conductorRutaAnt = $rutaAntigua->conductores()->first();
            if(is_null($conductorRutaAnt)){
                Ruta::query()->where('id', $ruta_idAnt)->delete();
            }
        });
    }

    public static function borrarRutaSiNoUsada($ruta){
        DB::transaction(function() use ($ruta){
            $conductorRutaAnt = $ruta->conductores()->first();
            if(is_null($conductorRutaAnt)){
                Ruta::query()->where('id', $ruta->id)->delete();
            }
        });
    }
}