<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Conductor;
use App\Coche;
use App\Ruta;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\QueryException;

class RutaTest extends TestCase
{
    use DatabaseMigrations;

    public function testRecogerDatos()
    {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio', 'fechaNacimiento' => '1980-01-20', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        Conductor::create(['correo' => 'emailej2A@dss.es', 'nombre' => 'Andrea',  'fechaNacimiento' => '1980-01-30', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        Coche::create(['matricula' => 'A1234BC', 'marca' => 'Mercedes', 'modelo' => 'modelo1', 'plazas' => 4, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1A@dss.es']);
        Coche::create(['matricula' => 'A1234BD', 'marca' => 'Mercedes', 'modelo' => 'modelo1', 'plazas' => 4, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1A@dss.es']);
       
        $ruta = Ruta::query()->first();
        
        $this->assertEquals("Novelda", $ruta->localidad);
        $this->assertEquals("UA",      $ruta->universidad);
        
        $coche = $ruta->conductores()->first()->coches()->first();

        $this->assertEquals("A1234BC", $coche->matricula);

        $conductor = $ruta->conductores()->get();
        
        $this->assertEquals("emailej1A@dss.es", $conductor[0]->correo);
        $this->assertEquals("emailej2A@dss.es", $conductor[1]->correo);
    }

    public function testQuery()
    {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UMH']);
        Ruta::create(['localidad' => 'Elche',   'universidad' => 'UPV']);
    
        $ruta = Ruta::query()->where('localidad', 'like', 'Novelda')->get();

        $this->assertEquals("UA",  $ruta[0]->universidad);
        $this->assertEquals("UMH", $ruta[1]->universidad);
    }

    public function testCrear() 
    {
        $c_valid = new Ruta(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $c_valid->save();

        $this->assertDatabaseHas('rutas', ['localidad' => 'Novelda', 'universidad' => 'UA']);
    }

    public function testDuplicatePK()
    {
        $this->expectException(QueryException::class);

        $c_valid = new Ruta(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $c_valid->save();

        $c_invalid = new Ruta(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $c_invalid->save();
    }

    public function testNULLPK()
    {

        $this->expectException(QueryException::class);

        $c_invalid = new Ruta(['localidad' => NULL, 'universidad' => 'UA']);
        $c_invalid->save();

        $c_invalid = new Ruta(['localidad' => 'Novelda', 'universidad' => NULL]);
        $c_invalid->save();

        $c_invalid = new Ruta(['localidad' => NULL, 'universidad' => NULL]);
        $c_invalid->save();
    }
}
