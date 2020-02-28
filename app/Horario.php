<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = ['Fecha', 'Tipo_viaje', 'Coche_Matricula', 'Hora'];

    public function coche(){
        return $this->beongsTo('App\Coche', 'Coche_Matricula', 'Matricula');
    }
}
