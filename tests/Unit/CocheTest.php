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
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testRecogerDatos()
    {
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $id_ruta = Ruta::query()->first()->id;
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4, 'Precio' => 1, 'Conductor_DNI' => '12345678A', 'Ruta_id' => $id_ruta]);
        Slot::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15']);

        $coche = Coche::query()->first();

        $this->assertEquals("A1234BC", $coche->Matricula);
        $this->assertEquals("Mercedes", $coche->Marca);
        $this->assertEquals('modelo1', $coche->Modelo);
        $this->assertEquals(4, $coche->Plazas);
        $this->assertEquals(1, $coche->Precio);
        $this->assertEquals('12345678A', $coche->Conductor_DNI);
        $this->assertEquals(1, $coche->Ruta_id);

        $conductor = $coche->conductor;

        $this->assertEquals("12345678A", $conductor->DNI);
        $this->assertEquals("Antonio", $conductor->Nombre);

        $slot = $coche->slots()->first();

        $this->assertEquals("A1234BC", $slot->Coche_Matricula);

        $ruta = $coche->ruta;

        $this->assertEquals("Novelda", $ruta->Localidad);
    }


    public function testQuery()
    {
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Conductor::create(['DNI' => '12345678B', 'Nombre' => 'Juan',    'Edad' => 21, 'Correo' => 'juan@dss.com'   ]);
        Conductor::create(['DNI' => '12345678L', 'Nombre' => 'Jorge',   'Edad' => 21, 'Correo' => 'jorge@dss.com'  ]);

        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UMH']);
        $rutas = Ruta::query()->get();
        
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1',     'Plazas' => 4, 'Precio' => 1, 'Conductor_DNI' => '12345678A', 'Ruta_id' => $rutas[0]->id]);
        Coche::create(['Matricula' => 'X5678YZ', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX',     'Plazas' => 4, 'Precio' => 1, 'Conductor_DNI' => '12345678A', 'Ruta_id' => $rutas[0]->id]);
        Coche::create(['Matricula' => 'RT5555A', 'Marca' => 'Mercedes', 'Modelo' => 'modeloPeque', 'Plazas' => 2, 'Precio' => 1.5, 'Conductor_DNI' => '12345678B', 'Ruta_id' => $rutas[0]->id]);
        Coche::create(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG',     'Plazas' => 3, 'Precio' => 1, 'Conductor_DNI' => '12345678L', 'Ruta_id' => $rutas[1]->id]);

        // Nombre del conductor del modeloPeque
        $conductor = Coche::query()->join('conductors', 'coches.Conductor_DNI', 'conductors.DNI')->where('Modelo', 'modeloPeque')->first();
        
        $this->assertEquals("RT5555A", $conductor->Matricula);
        $this->assertEquals("Juan", $conductor->Nombre);
        

    }

    public function testCrear() {

        $conductor = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $conductor->save();

        $ruta = new Ruta(['Localidad' => 'Santa Pola', 'Universidad' => 'UA']);
        $ruta->save();

        $c_valid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia', 'Modelo' => 'modeloG', 'Plazas' => 3,  'Precio' => 1, 'Conductor_DNI' => '12345678D', 'Ruta_id' => $ruta->id]);
        $c_valid->save();

        $this->assertDatabaseHas('coches', ['Matricula' => 'ON4328A', 'Marca' => 'Dacia', 'Modelo' => 'modeloG', 'Plazas' => 3, 'Conductor_DNI' => '12345678D']);
    }

    public function testDuplicatePK(){

        $this->expectException(QueryException::class);

        $conductor = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $conductor->save();

        $ruta = new Ruta(['Localidad' => 'Santa Pola', 'Universidad' => 'UA']);
        $ruta->save();
        
        $c_valid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia', 'Modelo' => 'modeloG', 'Plazas' => 3,  'Precio' => 1, 'Conductor_DNI' => '12345678D', 'Ruta_id' => $ruta->id]);
        $c_valid->save();

        $c_invalid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Mercedes', 'Modelo' => 'modelo5', 'Plazas' => 2,  'Precio' => 1, 'Conductor_DNI' => '12345678D', 'Ruta_id' => $ruta->id]);
        $c_invalid->save();
    }

    public function testNULLPK(){

        $this->expectException(QueryException::class);
        
        $conductor = new Conductor(['DNI' => '12345678D', 'Nombre' => 'Andrea',  'Edad' => 30, 'Correo' => 'andrea@dss.com']);
        $conductor->save();

        $ruta = new Ruta(['Localidad' => 'Santa Pola', 'Universidad' => 'UA']);
        $ruta->save();

        $c_invalid = new Coche(['Matricula' => NULL, 'Marca' => 'Mercedes', 'Modelo' => 'modelo5', 'Plazas' => 2,  'Precio' => 1, 'Conductor_DNI' => '12345678D', 'Ruta_id' => $ruta->id]);
        $c_invalid->save();
    }

    public function testNotFK(){

        $this->expectException(QueryException::class);

        $ruta = new Ruta(['Localidad' => 'Santa Pola', 'Universidad' => 'UA']);
        $ruta->save();
        
        $c_valid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia', 'Modelo' => 'modeloG', 'Plazas' => 3,  'Precio' => 1, 'Conductor_DNI' => '12345678D', 'Ruta_id' => $ruta->id]);
        $c_valid->save();
    }
}
