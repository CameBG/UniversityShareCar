<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Conductor;
use App\Coche;
use App\Horario;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\QueryException;

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
        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);

        $coche = Coche::query()->first();

        $this->assertEquals("A1234BC", $coche->Matricula);
        $this->assertEquals("Mercedes", $coche->Marca);
        $this->assertEquals('modelo1', $coche->Modelo);
        $this->assertEquals(4, $coche->Pasajeros);
        $this->assertEquals('12345678A', $coche->Conductor_DNI);

        $conductor = $coche->conductor;

        $this->assertEquals("12345678A", $conductor->DNI);
        $this->assertEquals("Antonio", $conductor->Nombre);

        $horario = $coche->horarios()->first();

        $this->assertEquals("A1234BC", $horario->Coche_Matricula);
        $this->assertEquals("Novelda", $horario->Origen);
    }

    public function testQuery()
    {
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Conductor::create(['DNI' => '12345678B', 'Nombre' => 'Juan',    'Edad' => 21, 'Correo' => 'juan@dss.com'   ]);
        Conductor::create(['DNI' => '12345678L', 'Nombre' => 'Jorge',   'Edad' => 21, 'Correo' => 'jorge@dss.com'  ]);

        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1',     'Pasajeros' => 4, 'Conductor_DNI' => '12345678A']);
        Coche::create(['Matricula' => 'X5678YZ', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX',     'Pasajeros' => 4, 'Conductor_DNI' => '12345678A']);
        Coche::create(['Matricula' => 'RT5555A', 'Marca' => 'Mercedes', 'Modelo' => 'modeloPeque', 'Pasajeros' => 2, 'Conductor_DNI' => '12345678B']);
        Coche::create(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG',     'Pasajeros' => 3, 'Conductor_DNI' => '12345678L']);

        // Nombre del conductor del modeloPeque
        $conductor = Coche::query()->join('conductors', 'coches.Conductor_DNI', 'conductors.DNI')->where('Modelo', 'modeloPeque')->first();

        $this->assertEquals("RT5555A", $conductor->Matricula);
        $this->assertEquals("Juan", $conductor->Nombre);
    }

    public function testCrear() {

        $conductor = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $conductor->save();

        $c_valid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG', 'Pasajeros' => 3, 'Conductor_DNI' => '12345678D']);
        $c_valid->save();

        $this->assertDatabaseHas('coches', ['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG', 'Pasajeros' => 3, 'Conductor_DNI' => '12345678D']);
    }

    public function testDuplicatePK(){

        $this->expectException(QueryException::class);

        $conductor = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $conductor->save();
        
        $c_valid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG',     'Pasajeros' => 3, 'Conductor_DNI' => '12345678D']);
        $c_valid->save();

        $c_invalid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Mercedes',    'Modelo' => 'modelo5',     'Pasajeros' => 2, 'Conductor_DNI' => '12345678D']);
        $c_invalid->save();
    }

    public function testNULLPK(){

        $this->expectException(QueryException::class);
        
        $conductor = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $conductor->save();

        $c_invalid = new Coche(['Matricula' => NULL, 'Marca' => 'Mercedes',    'Modelo' => 'modelo5',     'Pasajeros' => 2, 'Conductor_DNI' => '12345678D']);
        $c_invalid->save();
    }

    public function testNotFK(){

        $this->expectException(QueryException::class);

        $c_valid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG', 'Pasajeros' => 3, 'Conductor_DNI' => '12345678D']);
        $c_valid->save();
    }
}
