<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Conductor;
use App\Coche;
use App\Slot;
use App\Ruta;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\QueryException;

class CocheTest extends TestCase
{
    use DatabaseMigrations;

    public function testRecogerDatos()
    {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio', 'fechaNacimiento' => '1980-01-20', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        Coche::create(['matricula' => 'A1234BC', 'marca' => 'Mercedes', 'modelo' => 'modelo1', 'plazas' => 4, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1A@dss.es']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '08:15', 'direccion' => 'Ida', 'coche_matricula' => 'A1234BC']);

        $coche = Coche::query()->first();

        $this->assertEquals("A1234BC", $coche->matricula);
        $this->assertEquals("Mercedes", $coche->marca);
        $this->assertEquals('modelo1', $coche->modelo);
        $this->assertEquals(4, $coche->plazas);
        $this->assertEquals(1, $coche->precioViaje);
        $this->assertEquals('emailej1A@dss.es', $coche->conductor_correo);

        $conductor = $coche->conductor;

        $this->assertEquals("emailej1A@dss.es", $conductor->correo);
        $this->assertEquals("Antonio", $conductor->nombre);

        $slot = $coche->slots()->first();

        $this->assertEquals("A1234BC", $slot->coche_matricula);
    }

    public function testQuery()
    {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UMH']);
        $rutas = Ruta::query()->get();

        Conductor::create(['correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio', 'fechaNacimiento' => '1980-01-20', 'ruta_id' => $rutas[0]->id, 'puntoRecogida' => 'punto1']);
        Conductor::create(['correo' => 'emailej1B@dss.es', 'nombre' => 'Juan',    'fechaNacimiento' => '1980-01-21', 'ruta_id' => $rutas[1]->id, 'puntoRecogida' => 'punto1']);
        Conductor::create(['correo' => 'emailej1L@dss.es', 'nombre' => 'Jorge',   'fechaNacimiento' => '1980-01-21', 'ruta_id' => $rutas[1]->id, 'puntoRecogida' => 'punto1']);
        
        Coche::create(['matricula' => 'A1234BC', 'marca' => 'Mercedes', 'modelo' => 'modelo1',     'plazas' => 4, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1A@dss.es']);
        Coche::create(['matricula' => 'X5678YZ', 'marca' => 'Hyundai',  'modelo' => 'modeloX',     'plazas' => 4, 'nombre' => 'Coche2', 'precioViaje' => 1, 'conductor_correo' => 'emailej1A@dss.es']);
        Coche::create(['matricula' => 'RT5555A', 'marca' => 'Mercedes', 'modelo' => 'modeloPeque', 'plazas' => 2, 'nombre' => 'Coche1', 'precioViaje' => 1.5, 'conductor_correo' => 'emailej1B@dss.es']);
        Coche::create(['matricula' => 'ON4328A', 'marca' => 'Dacia',    'modelo' => 'modeloG',     'plazas' => 3, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1L@dss.es']);

        // nombre del conductor del modeloPeque
        $conductor = Coche::query()->join('conductors', 'coches.conductor_correo', 'conductors.correo')->where('modelo', 'modeloPeque')->first();
        
        $this->assertEquals("RT5555A", $conductor->matricula);
        $this->assertEquals("Juan", $conductor->nombre);
    }

    public function testCrear() 
    {
        $ruta = new Ruta(['localidad' => 'Santa Pola', 'universidad' => 'UA']);
        $ruta->save();

        $conductor = new Conductor(['correo' => 'emailej1D@dss.es', 'nombre' => 'Andrea', 'fechaNacimiento' => '1980-01-30', 'ruta_id' => $ruta->id, 'puntoRecogida' => 'punto1']);
        $conductor->save();

        $c_valid = new Coche(['matricula' => 'ON4328A', 'marca' => 'Dacia', 'modelo' => 'modeloG', 'plazas' => 3, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1D@dss.es']);
        $c_valid->save();

        $this->assertDatabaseHas('coches', ['matricula' => 'ON4328A', 'marca' => 'Dacia', 'modelo' => 'modeloG', 'plazas' => 3, 'conductor_correo' => 'emailej1D@dss.es']);
    }

    public function testDuplicatePK()
    {
        $this->expectException(QueryException::class);

        $ruta = new Ruta(['localidad' => 'Santa Pola', 'universidad' => 'UA']);
        $ruta->save();

        $conductor = new Conductor(['correo' => 'emailej1D@dss.es', 'nombre' => 'Andrea', 'fechaNacimiento' => '1980-01-30', 'ruta_id' => $ruta->id, 'puntoRecogida' => 'punto1']);
        $conductor->save();
        
        $c_valid = new Coche(['matricula' => 'ON4328A', 'marca' => 'Dacia', 'modelo' => 'modeloG', 'plazas' => 3, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1D@dss.es']);
        $c_valid->save();

        $c_invalid = new Coche(['matricula' => 'ON4328A', 'marca' => 'Mercedes', 'modelo' => 'modelo5', 'plazas' => 2, 'nombre' => 'Coche1',  'precioViaje' => 1, 'conductor_correo' => 'emailej1D@dss.es']);
        $c_invalid->save();
    }

    public function testNULLPK()
    {
        $this->expectException(QueryException::class);
        
        $ruta = new Ruta(['localidad' => 'Santa Pola', 'universidad' => 'UA']);
        $ruta->save();

        $conductor = new Conductor(['correo' => 'emailej1D@dss.es', 'nombre' => 'Andrea', 'fechaNacimiento' => '1980-01-30', 'ruta_id' => $ruta->id, 'puntoRecogida' => 'punto1']);
        $conductor->save();

        $c_invalid = new Coche(['matricula' => NULL, 'marca' => 'Mercedes', 'modelo' => 'modelo5', 'plazas' => 2, 'precioViaje' => 1, 'conductor_correo' => 'emailej1D@dss.es']);
        $c_invalid->save();
    }

    public function testNotFK()
    {
        $this->expectException(QueryException::class);
        
        $c_valid = new Coche(['matricula' => 'ON4328A', 'marca' => 'Dacia', 'modelo' => 'modeloG', 'plazas' => 3, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1D@dss.es']);
        $c_valid->save();
    }
}
