<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'email'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'email', 'email');
    }
}
