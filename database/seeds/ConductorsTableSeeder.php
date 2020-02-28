<?php

use Illuminate\Database\Seeder;
use App\Conductor;

class ConductorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conductor::query()->delete();
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio',   'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Conductor::create(['DNI' => '12345678B', 'Nombre' => 'Juan',      'Edad' => 21, 'Correo' => 'juan@dss.com'   ]);
        Conductor::create(['DNI' => '12345678C', 'Nombre' => 'María',     'Edad' => 25, 'Correo' => 'maria@dss.com'  ]);
        Conductor::create(['DNI' => '12345678D', 'Nombre' => 'Andrea',    'Edad' => 30, 'Correo' => 'andrea@dss.com' ]);
        Conductor::create(['DNI' => '12345678E', 'Nombre' => 'Jose',      'Edad' => 18, 'Correo' => 'jose@dss.com'   ]);
        Conductor::create(['DNI' => '12345678F', 'Nombre' => 'Helena',    'Edad' => 20, 'Correo' => 'helena@dss.com' ]);
        Conductor::create(['DNI' => '12345678G', 'Nombre' => 'Alba',      'Edad' => 20, 'Correo' => 'alba@dss.com'   ]);
        Conductor::create(['DNI' => '12345678H', 'Nombre' => 'Enma',      'Edad' => 25, 'Correo' => 'enma@dss.com'   ]);
        Conductor::create(['DNI' => '12345678I', 'Nombre' => 'David',     'Edad' => 24, 'Correo' => 'david@dss.com'  ]);
        Conductor::create(['DNI' => '12345678K', 'Nombre' => 'Manuel',    'Edad' => 23, 'Correo' => 'manuel@dss.com' ]);
        Conductor::create(['DNI' => '12345678J', 'Nombre' => 'Adrián',    'Edad' => 19, 'Correo' => 'adrian@dss.com' ]);
        Conductor::create(['DNI' => '12345678L', 'Nombre' => 'Jorge',     'Edad' => 21, 'Correo' => 'jorge@dss.com'  ]);
        Conductor::create(['DNI' => '12345678M', 'Nombre' => 'Luis',      'Edad' => 22, 'Correo' => 'luis@dss.com'   ]);
        Conductor::create(['DNI' => '12345678N', 'Nombre' => 'Samuel',    'Edad' => 23, 'Correo' => 'samuel@dss.com' ]);
        Conductor::create(['DNI' => '12345678O', 'Nombre' => 'Sandra',    'Edad' => 23, 'Correo' => 'sandra@dss.com' ]);
        Conductor::create(['DNI' => '12345678P', 'Nombre' => 'Rubén',     'Edad' => 18, 'Correo' => 'ruben@dss.com'  ]);
        Conductor::create(['DNI' => '12345678Q', 'Nombre' => 'Alejandro', 'Edad' => 18, 'Correo' => 'alejandro@dss.com'  ]);
    }
}
