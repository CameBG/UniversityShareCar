<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Conductor;
use App\Coche;
use App\Slot;
use App\Ruta;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\QueryException;

class SlotTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    
    public function testRecogerDatos()
    {
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4,  'Precio' => 1, 'Conductor_DNI' => '12345678A', 'Ruta_id' => $ruta_id]);
        Slot::create(['Fecha' => '2020-02-20', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC']);

        $slot = Slot::query()->first();
        
        $this->assertEquals("2020-02-20", $slot->Fecha);
        $this->assertEquals("Ida", $slot->Tipo_viaje);
        $this->assertEquals('A1234BC', $slot->Coche_Matricula);
        $this->assertEquals('08:15:00', $slot->Hora);

        $coche = $slot->coche;

        $this->assertEquals("A1234BC", $coche->Matricula);
        $this->assertEquals("Mercedes", $coche->Marca);

        $conductor = $coche->conductor;

        $this->assertEquals("12345678A", $conductor->DNI);
        $this->assertEquals("Antonio", $conductor->Nombre);
    }

    public function testQuery()
    {
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);

        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;

        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4, 'Precio' => 1,   'Conductor_DNI' => '12345678A', 'Ruta_id' => $ruta_id]);
        Coche::create(['Matricula' => 'X5678YZ', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX', 'Plazas' => 4, 'Precio' => 1.5, 'Conductor_DNI' => '12345678A', 'Ruta_id' => $ruta_id]);

        Slot::create(['Fecha' => '2020-02-21', 'Hora' => '08:15', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'A1234BC']);
        Slot::create(['Fecha' => '2020-02-20', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'A1234BC']);
        Slot::create(['Fecha' => '2020-02-23', 'Hora' => '08:00', 'Tipo_viaje' => 'Ida',    'Coche_Matricula' => 'X5678YZ']);
        Slot::create(['Fecha' => '2020-02-24', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'X5678YZ']);

        // Nombre del conductor que va a las 13:15
        $conductor = Slot::query()->join('coches', 'slots.Coche_Matricula', 'coches.Matricula')->join('conductors', 'coches.Conductor_DNI', 'conductors.DNI')->where('Hora', '13:15:00')->first();
    
        $this->assertEquals("Antonio", $conductor->Nombre);
    }

   public function testCrear() {

        $conductor = new Conductor();
        $conductor->DNI = '12345678D';
        $conductor->Nombre = 'Andrea';
        $conductor->Edad = 30;
        $conductor->Correo = 'andrea@dss.com';
        $conductor->save();

        $ruta = new Ruta();
        $ruta->Localidad = 'Novelda';
        $ruta->Universidad = 'UA';
        $ruta->save();
        $coche = new Coche();
        $coche->Matricula = 'ON4328A';
        $coche->Marca = 'Mercedes';
        $coche->Modelo = 'modelo1';
        $coche->Plazas = 4;
        $coche->Precio = 1;
        $coche->Conductor_DNI = '12345678D';
        $coche->Ruta_id = $ruta->id;
        $coche->save();

        $slot = new Slot();
        $slot->Fecha = '2020-02-24';
        $slot->Tipo_viaje = 'Vuelta';
        $slot->Coche_Matricula = 'ON4328A';
        $slot->Hora = '13:15';
        $slot->save();

        $this->assertDatabaseHas('slots', ['Fecha' => '2020-02-24', 'Hora' => '13:15:00', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'ON4328A']);
    }

    public function testNULL(){

        $this->expectException(QueryException::class);

        $conductor = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $conductor->save();
        
        $ruta = new Ruta(['Localidad' => 'Santa Pola', 'Universidad' => 'UA']);
        $ruta->save();

        $coche = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG', 'Plazas' => 3, 'Precio' => 1, 'Conductor_DNI' => '12345678D', 'Ruta_id' => $ruta->id]);
        $coche->save();

        $h_invalid = new Slot(['Fecha' => NULL, 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'ON4328A']);
        $h_invalid->save();
    }

    public function testNotFK(){

        $this->expectException(QueryException::class);

        $h_invalid = new Slot(['Fecha' => '2020-02-24', 'Hora' => '13:15', 'Tipo_viaje' => 'Vuelta', 'Coche_Matricula' => 'ON4328A']);
        $h_invalid->save();
    }
}
