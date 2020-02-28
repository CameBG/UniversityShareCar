<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Coche;
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
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Pasajeros' => 4, 'Conductor_DNI' => '12345678A']);

        $coche = Coche::query()->first();
        
        $this->assertEquals("A1234BC", $coche->Matricula);
        $this->assertEquals("Mercedes", $coche->Marca);
        $this->assertEquals('modelo1', $coche->Modelo);
        $this->assertEquals(4, $coche->Pasajeros);
        $this->assertEquals('12345678A', $coche->Conductor_DNI);

        //$conductor = Conductor::query()->where('DNI', $coche->Conductor_DNI)->first();

        $conductor = $coche->conductor;

        $this->assertEquals("12345678A", $conductor->DNI);
        $this->assertEquals("Antonio", $conductor->Nombre);
    }
}
