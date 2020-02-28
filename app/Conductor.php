<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $fillable = ['DNI', 'Nombre', 'Edad', 'Correo'];

    public function coches() {
        return $this->hasMany('App\Coche', 'DNI', 'Conductor_DNI');
    }
}
