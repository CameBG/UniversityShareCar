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
    use DatabaseMigrations;
    
    public function testRecogerDatos()
    {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio', 'fechaNacimiento' => '1980-01-20', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        Coche::create(['matricula' => 'A1234BC', 'marca' => 'Mercedes', 'modelo' => 'modelo1', 'plazas' => 4, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1A@dss.es']);
        Slot::create(['fecha' => '2020-02-20', 'hora' => '08:15', 'direccion' => 'Ida', 'coche_matricula' => 'A1234BC']);

        $slot = Slot::query()->first();
        
        $this->assertEquals("2020-02-20", $slot->fecha);
        $this->assertEquals("Ida", $slot->direccion);
        $this->assertEquals('A1234BC', $slot->coche_matricula);
        $this->assertEquals('08:15:00', $slot->hora);

        $coche = $slot->coche;

        $this->assertEquals("A1234BC", $coche->matricula);
        $this->assertEquals("Mercedes", $coche->marca);

        $conductor = $coche->conductor;

        $this->assertEquals("emailej1A@dss.es", $conductor->correo);
        $this->assertEquals("Antonio", $conductor->nombre);
    }

    public function testQuery()
    {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;

        Conductor::create(['correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio', 'fechaNacimiento' => '1980-01-20', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);

        Coche::create(['matricula' => 'A1234BC', 'marca' => 'Mercedes', 'modelo' => 'modelo1', 'plazas' => 4, 'nombre' => 'Coche1', 'precioViaje' => 1,   'conductor_correo' => 'emailej1A@dss.es']);
        Coche::create(['matricula' => 'X5678YZ', 'marca' => 'Hyundai',  'modelo' => 'modeloX', 'plazas' => 4, 'nombre' => 'Coche2', 'precioViaje' => 1.5, 'conductor_correo' => 'emailej1A@dss.es']);

        Slot::create(['fecha' => '2020-02-21', 'hora' => '08:15', 'direccion' => 'Ida',    'coche_matricula' => 'A1234BC']);
        Slot::create(['fecha' => '2020-02-20', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'A1234BC']);
        Slot::create(['fecha' => '2020-02-23', 'hora' => '08:00', 'direccion' => 'Ida',    'coche_matricula' => 'X5678YZ']);
        Slot::create(['fecha' => '2020-02-24', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'X5678YZ']);

        // nombre del conductor que va a las 13:15
        $conductor = Slot::query()->join('coches', 'slots.coche_matricula', 'coches.matricula')->join('conductors', 'coches.conductor_correo', 'conductors.correo')->where('hora', '13:15:00')->first();
        $this->assertEquals("Antonio", $conductor->nombre);
    }

   public function testCrear() 
   {
        $ruta = new Ruta();
        $ruta->localidad = 'Novelda';
        $ruta->universidad = 'UA';
        $ruta->save();

        $conductor = new Conductor();
        $conductor->correo = 'emailej1D@dss.es';
        $conductor->nombre = 'Andrea';
        $conductor->fechaNacimiento = '1980-01-20';
        $conductor->ruta_id = $ruta->id;
        $conductor->puntoRecogida = 'punto1';
        $conductor->save();

        $coche = new Coche();
        $coche->matricula = 'ON4328A';
        $coche->marca = 'Mercedes';
        $coche->modelo = 'modelo1';
        $coche->plazas = 4;
        $coche->nombre = 'coche1';
        $coche->precioViaje = 1;
        $coche->conductor_correo = 'emailej1D@dss.es';
        $coche->save();

        $slot = new Slot();
        $slot->fecha = '2020-02-24';
        $slot->direccion = 'Vuelta';
        $slot->coche_matricula = 'ON4328A';
        $slot->hora = '13:15';
        $slot->save();

        $this->assertDatabaseHas('slots', ['fecha' => '2020-02-24', 'hora' => '13:15:00', 'direccion' => 'Vuelta', 'coche_matricula' => 'ON4328A']);
    }

    public function testNULL()
    {
        $this->expectException(QueryException::class);

        $ruta = new Ruta(['localidad' => 'Santa Pola', 'universidad' => 'UA']);
        $ruta->save();

        $conductor = new Conductor(['correo' => 'emailej1D@dss.es', 'nombre' => 'Andrea', 'fechaNacimiento' => '1980-01-21', 'ruta_id' => $ruta->id, 'puntoRecogida' => 'punto1']);
        $conductor->save();
        
        $coche = new Coche(['matricula' => 'ON4328A', 'marca' => 'Dacia', 'modelo' => 'modeloG', 'plazas' => 3, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1D@dss.es']);
        $coche->save();

        $h_invalid = new Slot(['fecha' => NULL, 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'ON4328A']);
        $h_invalid->save();
    }

    public function testNotFK()
    {
        $this->expectException(QueryException::class);

        $h_invalid = new Slot(['fecha' => '2020-02-24', 'hora' => '13:15', 'direccion' => 'Vuelta', 'coche_matricula' => 'ON4328A']);
        $h_invalid->save();
    }
}
