<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = ['Fecha', 'Hora', 'Tipo_viaje', 'Coche_Matricula'];

    public function coche(){
        return $this->belongsTo('App\Coche', 'Coche_Matricula', 'Matricula');
    }
}
