<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $fillable = ['correo', 'nombre', 'apellido1', 'apellido2', 'fechaNacimiento', 'genero', 'telefono', 'rutaImagen', 'ruta_id', 'puntoRecogida'];

    public function coches() {
        return $this->hasMany('App\Coche', 'conductor_correo', 'correo');
    }
    
    public function ruta() {
        return $this->belongsTo('App\Ruta', 'ruta_id', 'id');
    }

    public static function currentConductor() {
        return Conductor::all()->first();
    }

    public function user() {
        return $this->belongsTo('App\User', 'correo', 'email');
    }
}
