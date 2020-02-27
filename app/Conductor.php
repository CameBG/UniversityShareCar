<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    public function coches() {
        return $this->hasOne('App\Coche');
    }
}
