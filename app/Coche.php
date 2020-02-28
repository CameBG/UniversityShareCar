<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    protected $fillable = ['Matricula', 'Marca', 'Modelo', 'Pasajeros', 'Conductor_DNI'];

    public function conductor() {
        return $this->belongsTo('App\Conductor', 'Conductor_DNI', 'DNI');
    }

    public function horarios(){
        return $this->hasMany('App\Horario');
    }
}
