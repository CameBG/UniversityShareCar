<?php

use Illuminate\Database\Seeder;
use App\Ruta;
use App\Conductor;

class RutasTableSeeder extends Seeder
{
    public function run()
    {
        Conductor::query()->delete();
        Ruta::query()->delete();
        
        Ruta::create(['localidad' => 'Novelda',    'universidad' => 'UA' ]);
        Ruta::create(['localidad' => 'Novelda',    'universidad' => 'UMH']);
        Ruta::create(['localidad' => 'Santa Pola', 'universidad' => 'UA' ]);
        Ruta::create(['localidad' => 'Santa Pola', 'universidad' => 'UMH']);
        Ruta::create(['localidad' => 'Elche',      'universidad' => 'UA' ]);
        Ruta::create(['localidad' => 'Elche',      'universidad' => 'UMH']);
        Ruta::create(['localidad' => 'Elche',      'universidad' => 'UV' ]);
        Ruta::create(['localidad' => 'Alcoy',      'universidad' => 'UPV']);
    }
}
