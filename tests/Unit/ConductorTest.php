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
    use DatabaseMigrations;

    public function testRecogerDatos()
    {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio', 'fechaNacimiento' => '1980-01-20', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        Coche::create(['matricula' => 'A1234BC', 'marca' => 'Mercedes', 'modelo' => 'modelo1', 'plazas' => 4, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1A@dss.es']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '08:15', 'direccion' => 'Ida', 'coche_matricula' => 'A1234BC']);

        $conductor = Conductor::query()->first();
        
        $this->assertEquals("emailej1A@dss.es", $conductor->correo);
        $this->assertEquals("Antonio", $conductor->nombre);
        $this->assertEquals('1980-01-20', $conductor->fechaNacimiento);

        $coche = $conductor->coches()->first();

        $this->assertEquals('emailej1A@dss.es', $coche->conductor_correo);
        $this->assertEquals("A1234BC", $coche->matricula);

        $slot = $coche->slots()->first();
        
        $this->assertEquals("A1234BC", $slot->coche_matricula);
    }

    public function testQuery()
    {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio', 'fechaNacimiento' => '1980-01-20', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        Conductor::create(['correo' => 'emailej1B@dss.es', 'nombre' => 'Juan',    'fechaNacimiento' => '1980-01-21', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        Conductor::create(['correo' => 'emailej1C@dss.es', 'nombre' => 'María',   'fechaNacimiento' => '1980-01-25', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        Conductor::create(['correo' => 'emailej1D@dss.es', 'nombre' => 'Andrea',  'fechaNacimiento' => '1980-01-30', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);

        // nombres de conductores que empiecen por A
        $conductor = Conductor::query()->where('nombre', 'like' ,'A%')->orderBy('nombre')->get();

        $this->assertEquals("Andrea", $conductor[0]->nombre);
        $this->assertEquals("Antonio", $conductor[1]->nombre);
    }

   public function testCrear() 
   {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;

        $c_valid = new Conductor(['correo' => 'emailej1D@dss.es', 'nombre' => 'Andrea', 'fechaNacimiento' => '1980-01-30', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        $c_valid->save();

        $this->assertDatabaseHas('conductors', ['correo' => 'emailej1D@dss.es', 'nombre' => 'Andrea', 'fechaNacimiento' => '1980-01-30', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
    }

    public function testDuplicatePK()
    {
        $this->expectException(QueryException::class);

        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;

        $c_valid = new Conductor(['correo' => 'emailej1D@dss.es', 'nombre' => 'Andrea', 'fechaNacimiento' => '1980-01-30', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        $c_valid->save();

        $c_invalid = new Conductor(['correo' => 'emailej1D@dss.es', 'nombre' => 'Marisa', 'fechaNacimiento' => '1980-01-21', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        $c_invalid->save();
    }

    public function testNULLPK()
    {
        $this->expectException(QueryException::class);

        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;

        $c_invalid = new Conductor(['correo' => NULL, 'nombre' => 'Andrea',  'fechaNacimiento' => '1980-01-30', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        $c_invalid->save();
    }
}
