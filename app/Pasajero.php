<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    protected $fillable = ['Correo', 'Nombre', 'Edad', 'Genero', 'Imagen', 'Telefono'];

    public function lineaSlots() {
        return $this->hasMany('App\LineaSlot', 'Pasajero_id', 'Correo');
    }
}
