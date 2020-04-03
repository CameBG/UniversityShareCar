<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    protected $fillable = ['matricula', 'nombre', 'marca', 'modelo', 'plazas', 'rutaImagen', 'precioViaje', 'conductor_correo'];

    public function conductor() {
        return $this->belongsTo('App\Conductor', 'conductor_correo', 'correo');
    }

    public function slots(){
        return $this->hasMany('App\Slot', 'coche_matricula', 'matricula');
    }
}
