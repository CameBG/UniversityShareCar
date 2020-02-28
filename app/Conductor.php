<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    public function coches() {
        return $this->hasMany('App\Coche');
    }
}
