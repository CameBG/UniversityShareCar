<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
protected $fillable = ['Matricula', 'Marca', 'Modelo', 'Plazas', 'Precio', 'Conductor_DNI', 'Ruta_id'];

    public function conductor() {
        return $this->belongsTo('App\Conductor', 'Conductor_DNI', 'DNI');
    }

    public function slots(){
        return $this->hasMany('App\Slot', 'Coche_Matricula', 'Matricula');
    }

    public function ruta() {
        return $this->belongsTo('App\Ruta', 'Ruta_id', 'id');
    }
}
