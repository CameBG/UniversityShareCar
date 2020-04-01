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
        Conductor::create(['Correo' => 'emailej1A@dss.es', 'Nombre' => 'Antonio', 'Edad' => 20, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
        Conductor::create(['Correo' => 'emailej2A@dss.es', 'Nombre' => 'Andrea', 'Edad' => 25, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1, 'Conductor_Correo' => 'emailej1A@dss.es']);
        Coche::create(['Matricula' => 'A1234BD', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1, 'Conductor_Correo' => 'emailej1A@dss.es']);
       

        $ruta = Ruta::query()->first();
        
        $this->assertEquals("Novelda", $ruta->Localidad);
        $this->assertEquals("UA", $ruta->Universidad);
        
        $coche = $ruta->conductores()->first()->coches()->first();

        $this->assertEquals("A1234BC", $coche->Matricula);

        $conductor = $ruta->conductores()->get();
        
        $this->assertEquals("emailej1A@dss.es", $conductor[0]->Correo);
        $this->assertEquals("emailej2A@dss.es", $conductor[1]->Correo);
        
    }

    public function testQuery(){
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UMH']);
        Ruta::create(['Localidad' => 'Elche', 'Universidad' => 'UPV']);
    
        $ruta = Ruta::query()->where('Localidad', 'like', 'Novelda')->get();
        $this->assertEquals("UA", $ruta[0]->Universidad);
        $this->assertEquals("UMH", $ruta[1]->Universidad);
    
    }

    public function testCrear() {
        $c_valid = new Ruta(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $c_valid->save();

        $this->assertDatabaseHas('rutas', ['Localidad' => 'Novelda', 'Universidad' => 'UA']);
    }

    public function testDuplicatePK(){

        $this->expectException(QueryException::class);

        $c_valid = new Ruta(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $c_valid->save();

        $c_invalid = new Ruta(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $c_invalid->save();
    }

    public function testNULLPK(){

        $this->expectException(QueryException::class);

        $c_invalid = new Ruta(['Localidad' => NULL, 'Universidad' => 'UA']);
        $c_invalid->save();

        $c_invalid = new Ruta(['Localidad' => 'Novelda', 'Universidad' => NULL]);
        $c_invalid->save();

        $c_invalid = new Ruta(['Localidad' => NULL, 'Universidad' => NULL]);
        $c_invalid->save();
    }
}
