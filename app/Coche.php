<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    public function conductor() {
        return $this->belongsTo('App\Conductor');
    }

    public function horarios(){
        return $this->hasMany('App\Horario');
    }
}
