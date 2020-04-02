<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    protected $fillable = ['correo', 'nombre', 'apellido1', 'apellido2', 'fechaNacimiento', 'genero', 'telefono', 'rutaImagen'];

    public function lineaSlots() {
        return $this->hasMany('App\LineaSlot', 'pasajero_correo', 'correo');
    }
}
