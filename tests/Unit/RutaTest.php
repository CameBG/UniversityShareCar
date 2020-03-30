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
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4,  'Precio' => 1, 'Conductor_DNI' => '12345678A', 'Ruta_id' => $ruta_id]);
        Coche::create(['Matricula' => 'A1234BD', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4,  'Precio' => 1, 'Conductor_DNI' => '12345678A', 'Ruta_id' => $ruta_id]);
       

        $ruta = Ruta::query()->first();
        
        $this->assertEquals("Novelda", $ruta->Localidad);
        $this->assertEquals("UA", $ruta->Universidad);
        
        $coche = $ruta->coches()->get();

        $this->assertEquals("A1234BC", $coche[0]->Matricula);
        $this->assertEquals("A1234BD", $coche[1]->Matricula);

        $conductor = $ruta->coches()->first()->conductor;
        
        $this->assertEquals("12345678A", $conductor->DNI);
        
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
