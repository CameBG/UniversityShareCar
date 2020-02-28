<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Conductor;
use App\Coche;
use App\Horario;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\QueryException;

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
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);

        $horario = Horario::query()->first();
        
        $this->assertEquals("2020-02-20", $horario->Fecha);
        $this->assertEquals("Ida", $horario->Tipo_viaje);
        $this->assertEquals('A1234BC', $horario->Coche_Matricula);
        $this->assertEquals('08:15:00', $horario->Hora);
        $this->assertEquals('Novelda', $horario->Origen);
        $this->assertEquals('UA', $horario->Destino);

        $coche = $horario->coche;

        $this->assertEquals("A1234BC", $coche->Matricula);
        $this->assertEquals("Mercedes", $coche->Marca);

        $conductor = $coche->conductor;

        $this->assertEquals("12345678A", $conductor->DNI);
        $this->assertEquals("Antonio", $conductor->Nombre);
    }

    public function testQuery()
    {
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);

        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Pasajeros' => 4, 'Conductor_DNI' => '12345678A']);
        Coche::create(['Matricula' => 'X5678YZ', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX', 'Pasajeros' => 4, 'Conductor_DNI' => '12345678A']);

        Horario::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15', 'Origen' => 'Novelda', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-20', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'A1234BC', 'Hora' => '13:15', 'Origen' => 'Elche', 'Destino' => 'UA']);
        Horario::create(['Fecha' => '2020-02-23', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'X5678YZ', 'Hora' => '08:00', 'Origen' => 'Novelda', 'Destino' => 'UMH']);
        Horario::create(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'X5678YZ', 'Hora' => '13:15', 'Origen' => 'Elche', 'Destino' => 'UMH']);

        // Nombre del conductor que va de Elche a la UMH a las 13:15
        $conductor = Horario::query()->join('coches', 'horarios.Coche_Matricula', 'coches.Matricula')->join('conductors', 'coches.Conductor_DNI', 'conductors.DNI')->where('Hora', '13:15:00')->where('Destino', 'UMH')->first();
    
        $this->assertEquals("Antonio", $conductor->Nombre);
    }

   public function testCrear() {

        $conductor = new Conductor();
        $conductor->DNI = '12345678D';
        $conductor->Nombre = 'Andrea';
        $conductor->Edad = 30;
        $conductor->Correo = 'andrea@dss.com';
        $conductor->save();

        $coche = new Coche();
        $coche->Matricula = 'ON4328A';
        $coche->Marca = 'Mercedes';
        $coche->Modelo = 'modelo1';
        $coche->Pasajeros = 4;
        $coche->Conductor_DNI = '12345678D';
        $coche->save();

        $horario = new Horario();
        $horario->Fecha = '2020-02-24';
        $horario->Tipo_viaje = 'Vuelta';
        $horario->Coche_Matricula = 'ON4328A';
        $horario->Hora = '13:15';
        $horario->Origen = 'Elche';
        $horario->Destino = 'UMH';
        $horario->save();

        $this->assertDatabaseHas('horarios', ['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'ON4328A', 'Hora' => '13:15:00', 'Origen' => 'Elche', 'Destino' => 'UMH']);
    }

    public function testDuplicatePK(){

        $this->expectException(QueryException::class);

        $conductor = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $conductor->save();
        
        $coche = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG',     'Pasajeros' => 3, 'Conductor_DNI' => '12345678D']);
        $coche->save();

        $h_valid = new Horario(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'ON4328A', 'Hora' => '13:15', 'Origen' => 'Elche', 'Destino' => 'UMH']);
        $h_valid->save();

        $h_invalid = new Horario(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'ON4328A', 'Hora' => '13:15', 'Origen' => 'Elche', 'Destino' => 'UMH']);
        $h_invalid->save();
    }

    public function testNULLPK(){

        $this->expectException(QueryException::class);

        $conductor = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $conductor->save();
        
        $coche = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG',     'Pasajeros' => 3, 'Conductor_DNI' => '12345678D']);
        $coche->save();

        $h_invalid = new Horario(['Fecha' => NULL, 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'ON4328A', 'Hora' => '13:15', 'Origen' => 'Elche', 'Destino' => 'UMH']);
        $h_invalid->save();
    }

    public function testNotFK(){

        $this->expectException(QueryException::class);

        $h_invalid = new Horario(['Fecha' => '2020-02-24', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'ON4328A', 'Hora' => '13:15', 'Origen' => 'Elche', 'Destino' => 'UMH']);
        $h_invalid->save();
    }
}
