<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaSlot extends Model
{
    protected $fillable = ['Slot_id', 'numAsiento', 'Pasajero_id'];

    public function slot() {
        return $this->belongsTo('App\Slot', 'Slot_id', 'id');
    }
    public function pasajero() {
        return $this->belongsTo('App\Pasajero', 'Pasajero_id', 'Correo');
    }
}
