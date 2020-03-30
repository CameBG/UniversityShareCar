<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Conductor;
use App\Coche;
use App\Slot;
use App\Ruta;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\QueryException;

class ConductorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testRecogerDatos()
    {
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4,  'Precio' => 1, 'Conductor_DNI' => '12345678A', 'Ruta_id' => $ruta_id]);
        Slot::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15']);

        $conductor = Conductor::query()->first();
        
        $this->assertEquals("12345678A", $conductor->DNI);
        $this->assertEquals("Antonio", $conductor->Nombre);
        $this->assertEquals(20, $conductor->Edad);
        $this->assertEquals("antonio@dss.com", $conductor->Correo);

        $coche = $conductor->coches()->first();

        $this->assertEquals('12345678A', $coche->Conductor_DNI);
        $this->assertEquals("A1234BC", $coche->Matricula);

        $slot = $coche->slots()->first();
        
        $this->assertEquals("A1234BC", $slot->Coche_Matricula);

    }

    public function testQuery()
    {
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Conductor::create(['DNI' => '12345678B', 'Nombre' => 'Juan',    'Edad' => 21, 'Correo' => 'juan@dss.com'   ]);
        Conductor::create(['DNI' => '12345678C', 'Nombre' => 'María',   'Edad' => 25, 'Correo' => 'maria@dss.com'  ]);
        Conductor::create(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com' ]);

        // Nombres de conductores que empiecen por A
        $conductor = Conductor::query()->where('Nombre', 'like' ,'A%')->orderBy('Correo')->get();

        $this->assertEquals("Andrea", $conductor[0]->Nombre);
        $this->assertEquals("Antonio", $conductor[1]->Nombre);
    }

   public function testCrear() {
        $c_valid = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $c_valid->save();

        $this->assertDatabaseHas('conductors', ['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
    }

    public function testDuplicatePK(){

        $this->expectException(QueryException::class);

        $c_valid = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $c_valid->save();

        $c_invalid = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Marisa',  'Edad' => 20, 'Correo' => 'marisa@dss.com']);
        $c_invalid->save();
    }

    public function testNULLPK(){

        $this->expectException(QueryException::class);

        $c_invalid = new Conductor(['DNI' => NULL, 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $c_invalid->save();
    }
}
