<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Conductor;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CocheTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testRecogerDatos()
    {
        Conductor::create(['DNI' => '12345678B', 'Nombre' => 'Juan',    'Edad' => 21, 'Correo' => 'juan@dss.com']);

        $conductor = Conductor::query()->first();
        
        $this->assertEquals("12345678B", $conductor->DNI);
        $this->assertEquals("Juan", $conductor->Nombre);
        $this->assertEquals(21, $conductor->Edad);
        $this->assertEquals("juan@dss.com", $conductor->Correo);
    }

    public function testExample2()
    {
        $conductors = Conductor::all();
        foreach ($conductors as $conductor) {
            echo ($conductor->Nombre . " ");
        }

        $this->assertTrue(true);
    }
}
