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
        Ruta::create(['Localidad' =>    'Novelda', 'Universidad' => 'UPV']);
        Ruta::create(['Localidad' =>    'Novelda', 'Universidad' => 'UV' ]);

        Ruta::create(['Localidad' => 'Santa Pola', 'Universidad' => 'UA' ]);
        Ruta::create(['Localidad' => 'Santa Pola', 'Universidad' => 'UMH']);
        Ruta::create(['Localidad' => 'Santa Pola', 'Universidad' => 'UPV']);
        Ruta::create(['Localidad' => 'Santa Pola', 'Universidad' => 'UV' ]);
        Ruta::create(['Localidad' => 'Santa Pola', 'Universidad' => 'UO' ]);

        Ruta::create(['Localidad' =>     'Elche', 'Universidad' => 'UA' ]);
        Ruta::create(['Localidad' =>     'Elche', 'Universidad' => 'UMH']);
        Ruta::create(['Localidad' =>     'Elche', 'Universidad' => 'UV' ]);
        Ruta::create(['Localidad' =>     'Elche', 'Universidad' => 'UO' ]);
        Ruta::create(['Localidad' =>     'Elche', 'Universidad' => 'UPV']);
        Ruta::create(['Localidad' =>     'Elche', 'Universidad' => 'UJ' ]);
        
        Ruta::create(['Localidad' =>     'Alcoy', 'Universidad' => 'UPV']);
        Ruta::create(['Localidad' =>     'Alcoy', 'Universidad' => 'UA' ]);
    }
}
