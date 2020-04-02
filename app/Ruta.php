<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $fillable = ['localidad', 'universidad'];

    public function conductores() {
        return $this->hasMany('App\Conductor', 'ruta_id', 'id');
    }
}
