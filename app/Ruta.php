<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $fillable = ['id', 'Localidad', 'Universidad'];

    public function coches() {
        return $this->hasMany('App\Coche', 'Ruta_id', 'id');
    }
}
