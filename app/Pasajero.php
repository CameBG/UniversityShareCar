<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    protected $fillable = ['DNI', 'Nombre', 'Edad', 'Correo'];

    public function lineaSlots() {
        return $this->hasMany('App\LineaSlot', 'Pasajero_id', 'DNI');
    }
}
