<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaSlot extends Model
{
    protected $table = 'lineaSlots';
    protected $fillable = ['slot_id', 'numAsiento', 'pasajero_correo'];

    public function slot() {
        return $this->belongsTo('App\Slot', 'slot_id', 'id');
    }
    
    public function pasajero() {
        return $this->belongsTo('App\Pasajero', 'pasajero_correo', 'correo');
    }
}
