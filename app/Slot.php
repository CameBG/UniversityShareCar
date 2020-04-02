<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = ['fecha', 'hora', 'direccion', 'coche_matricula'];

    public function coche(){
        return $this->belongsTo('App\Coche', 'coche_matricula', 'matricula');
    }

    public function lineaSlots(){
        return $this->hasMany('App\LineaSlot', 'slot_id', 'id');
    }
}
