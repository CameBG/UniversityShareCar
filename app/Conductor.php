<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $fillable = ['Correo', 'Nombre', 'Edad', 'Punto_de_Recogida', 'Ruta_id'];

    public function coches() {
        return $this->hasMany('App\Coche', 'Conductor_Correo', 'Correo');
    }
    public function ruta() {
        return $this->belongsTo('App\Ruta', 'Ruta_id', 'id');
    }
}
