<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    public function coche(){
        return $this->beongsTo('App\Coche', 'Coche_Matricula', 'Matricula');
    }
}
