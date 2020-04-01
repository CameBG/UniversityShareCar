<?php

use Illuminate\Database\Seeder;
use App\Ruta;

class RutasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ruta::query()->delete();
        
        Ruta::create(['Localidad' =>    'Novelda', 'Universidad' => 'UA' ]);
        Ruta::create(['Localidad' =>    'Novelda', 'Universidad' => 'UMH']);

        Ruta::create(['Localidad' => 'Santa Pola', 'Universidad' => 'UA' ]);
        Ruta::create(['Localidad' => 'Santa Pola', 'Universidad' => 'UMH']);

        Ruta::create(['Localidad' =>     'Elche', 'Universidad' => 'UA' ]);
        Ruta::create(['Localidad' =>     'Elche', 'Universidad' => 'UMH']);
        Ruta::create(['Localidad' =>     'Elche', 'Universidad' => 'UV' ]);
        
        Ruta::create(['Localidad' =>     'Alcoy', 'Universidad' => 'UPV']);
    }
}
