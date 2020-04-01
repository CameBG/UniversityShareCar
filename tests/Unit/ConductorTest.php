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
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4,  'Precio' => 1, 'Conductor_Correo' => 'emailej1A@dss.es']);
        Slot::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15']);

        $conductor = Conductor::query()->first();
        
        $this->assertEquals("emailej1A@dss.es", $conductor->Correo);
        $this->assertEquals("Antonio", $conductor->Nombre);
        $this->assertEquals(20, $conductor->Edad);

        $coche = $conductor->coches()->first();

        $this->assertEquals('emailej1A@dss.es', $coche->Conductor_Correo);
        $this->assertEquals("A1234BC", $coche->Matricula);

        $slot = $coche->slots()->first();
        
        $this->assertEquals("A1234BC", $slot->Coche_Matricula);

    }

    public function testQuery()
    {
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['Correo' => 'emailej1A@dss.es', 'Nombre' => 'Antonio', 'Edad' => 20, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
        Conductor::create(['Correo' => 'emailej1B@dss.es', 'Nombre' => 'Juan',    'Edad' => 21, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
        Conductor::create(['Correo' => 'emailej1C@dss.es', 'Nombre' => 'María',   'Edad' => 25, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
        Conductor::create(['Correo' => 'emailej1D@dss.es', 'Nombre' => 'Andrea',  'Edad' => 30, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);

        // Nombres de conductores que empiecen por A
        $conductor = Conductor::query()->where('Nombre', 'like' ,'A%')->orderBy('Nombre')->get();

        $this->assertEquals("Andrea", $conductor[0]->Nombre);
        $this->assertEquals("Antonio", $conductor[1]->Nombre);
    }

   public function testCrear() {
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        $c_valid = new Conductor(['Correo' => 'emailej1D@dss.es', 'Nombre' => 'Andrea',  'Edad' => 30, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
        $c_valid->save();

        $this->assertDatabaseHas('conductors', ['Correo' => 'emailej1D@dss.es', 'Nombre' => 'Andrea',  'Edad' => 30, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
    }

    public function testDuplicatePK(){

        $this->expectException(QueryException::class);
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        $c_valid = new Conductor(['Correo' => 'emailej1D@dss.es', 'Nombre' => 'Andrea',  'Edad' => 30, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
        $c_valid->save();

        $c_invalid = new Conductor(['Correo' => 'emailej1D@dss.es', 'Nombre' => 'Marisa',  'Edad' => 20, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
        $c_invalid->save();
    }

    public function testNULLPK(){

        $this->expectException(QueryException::class);
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        $c_invalid = new Conductor(['Correo' => NULL, 'Nombre' => 'Andrea',  'Edad' => 30, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
        $c_invalid->save();
    }
}
