<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    protected $fillable = ['DNI', 'Nombre', 'Edad', 'Genero', 'Correo', 'Imagen', 'Telefono'];

    public function lineaSlots() {
        return $this->hasMany('App\LineaSlot', 'Pasajero_id', 'DNI');
    }
}
