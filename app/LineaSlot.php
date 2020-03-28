<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaSlot extends Model
{
    protected $fillable = ['Slot_id', 'numAsiento'];

    public function slot() {
        return $this->belongsTo('App\Slot', 'Slot_id', 'id');
    }
}
