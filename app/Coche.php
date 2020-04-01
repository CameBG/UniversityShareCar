<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
protected $fillable = ['Matricula', 'Marca', 'Modelo', 'Plazas', 'Precio', 'Conductor_Correo', 'Ruta_id'];

    public function conductor() {
        return $this->belongsTo('App\Conductor', 'Conductor_Correo', 'Correo');
    }

    public function slots(){
        return $this->hasMany('App\Slot', 'Coche_Matricula', 'Matricula');
    }
    
    
    
}
