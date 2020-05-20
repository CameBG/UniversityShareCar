<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function random_string() {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );
        for($i=0; $i<10; $i++) {
           $key .= $keys[array_rand($keys)];
        }
        return $key;
     }
}
