<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Horario;
use App\Coche;
use App\Conductor;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HorarioTest extends TestCase
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
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15']);

        $horario = Horario::query()->first();
        
        $this->assertEquals("2020-02-20", $horario->Fecha);
        $this->assertEquals("Ida", $horario->Tipo_viaje);
        $this->assertEquals('A1234BC', $horario->Coche_Matricula);
        $this->assertEquals('08:15:00', $horario->Hora);

        //$conductor = Conductor::query()->where('DNI', $coche->Conductor_DNI)->first();

        $coche = $horario->coche;

        $this->assertEquals("A1234BC", $coche->Matricula);
        $this->assertEquals("Mercedes", $coche->Marca);

        $conductor = $coche->conductor;

        $this->assertEquals("12345678A", $conductor->DNI);
        $this->assertEquals("Antonio", $conductor->Nombre);
    }
}
