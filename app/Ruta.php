<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $fillable = ['id', 'Localidad', 'Universidad'];

    public function conductores() {
        return $this->hasMany('App\Conductor', 'Ruta_id', 'id');
    }
}
