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
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['Correo' => 'emailej1A@dss.es', 'Nombre' => 'Antonio', 'Edad' => 20, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta_id]);
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1, 'Conductor_Correo' => 'emailej1A@dss.es']);
        Slot::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15']);

        $coche = Coche::query()->first();

        $this->assertEquals("A1234BC", $coche->Matricula);
        $this->assertEquals("Mercedes", $coche->Marca);
        $this->assertEquals('modelo1', $coche->Modelo);
        $this->assertEquals(4, $coche->Plazas);
        $this->assertEquals(1, $coche->Precio);
        $this->assertEquals('emailej1A@dss.es', $coche->Conductor_Correo);

        $conductor = $coche->conductor;

        $this->assertEquals("emailej1A@dss.es", $conductor->Correo);
        $this->assertEquals("Antonio", $conductor->Nombre);

        $slot = $coche->slots()->first();

        $this->assertEquals("A1234BC", $slot->Coche_Matricula);

    }


    public function testQuery()
    {
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UMH']);
        $rutas = Ruta::query()->get();

        Conductor::create(['Correo' => 'emailej1A@dss.es', 'Nombre' => 'Antonio', 'Edad' => 20, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $rutas[0]->id]);
        Conductor::create(['Correo' => 'emailej1B@dss.es', 'Nombre' => 'Juan',    'Edad' => 21, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $rutas[1]->id]);
        Conductor::create(['Correo' => 'emailej1L@dss.es', 'Nombre' => 'Jorge',   'Edad' => 21, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $rutas[1]->id]);
        
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1',     'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1, 'Conductor_Correo' => 'emailej1A@dss.es']);
        Coche::create(['Matricula' => 'X5678YZ', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX',     'Plazas' => 4, 'Nombre' => 'Coche2', 'Precio' => 1, 'Conductor_Correo' => 'emailej1A@dss.es']);
        Coche::create(['Matricula' => 'RT5555A', 'Marca' => 'Mercedes', 'Modelo' => 'modeloPeque', 'Plazas' => 2, 'Nombre' => 'Coche1', 'Precio' => 1.5, 'Conductor_Correo' => 'emailej1B@dss.es']);
        Coche::create(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG',     'Plazas' => 3, 'Nombre' => 'Coche1', 'Precio' => 1, 'Conductor_Correo' => 'emailej1L@dss.es']);

        // Nombre del conductor del modeloPeque
        $conductor = Coche::query()->join('conductors', 'coches.Conductor_Correo', 'conductors.Correo')->where('Modelo', 'modeloPeque')->first();
        
        $this->assertEquals("RT5555A", $conductor->Matricula);
        $this->assertEquals("Juan", $conductor->Nombre);
        

    }

    public function testCrear() {

        $ruta = new Ruta(['Localidad' => 'Santa Pola', 'Universidad' => 'UA']);
        $ruta->save();

        $conductor = new Conductor(['Correo' => 'emailej1D@dss.es', 'Nombre' => 'Andrea',  'Edad' => 30, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta->id]);
        $conductor->save();

        $c_valid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia', 'Modelo' => 'modeloG', 'Plazas' => 3, 'Nombre' => 'Coche1', 'Precio' => 1, 'Conductor_Correo' => 'emailej1D@dss.es']);
        $c_valid->save();

        $this->assertDatabaseHas('coches', ['Matricula' => 'ON4328A', 'Marca' => 'Dacia', 'Modelo' => 'modeloG', 'Plazas' => 3, 'Conductor_Correo' => 'emailej1D@dss.es']);
    }

    public function testDuplicatePK(){

        $this->expectException(QueryException::class);

        $ruta = new Ruta(['Localidad' => 'Santa Pola', 'Universidad' => 'UA']);
        $ruta->save();

        $conductor = new Conductor(['Correo' => 'emailej1D@dss.es', 'Nombre' => 'Andrea',  'Edad' => 30, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta->id]);
        $conductor->save();
        
        $c_valid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia', 'Modelo' => 'modeloG', 'Plazas' => 3, 'Nombre' => 'Coche1', 'Precio' => 1, 'Conductor_Correo' => 'emailej1D@dss.es']);
        $c_valid->save();

        $c_invalid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Mercedes', 'Modelo' => 'modelo5', 'Plazas' => 2, 'Nombre' => 'Coche1',  'Precio' => 1, 'Conductor_Correo' => 'emailej1D@dss.es']);
        $c_invalid->save();
    }

    public function testNULLPK(){

        $this->expectException(QueryException::class);
        
        $ruta = new Ruta(['Localidad' => 'Santa Pola', 'Universidad' => 'UA']);
        $ruta->save();

        $conductor = new Conductor(['Correo' => 'emailej1D@dss.es', 'Nombre' => 'Andrea',  'Edad' => 30, 'Punto_de_Recogida' => 'punto1', 'Ruta_id' => $ruta->id]);
        $conductor->save();

        $c_invalid = new Coche(['Matricula' => NULL, 'Marca' => 'Mercedes', 'Modelo' => 'modelo5', 'Plazas' => 2, 'Precio' => 1, 'Conductor_Correo' => 'emailej1D@dss.es']);
        $c_invalid->save();
    }

    public function testNotFK(){

        $this->expectException(QueryException::class);
        
        $c_valid = new Coche(['Matricula' => 'ON4328A', 'Marca' => 'Dacia', 'Modelo' => 'modeloG', 'Plazas' => 3, 'Nombre' => 'Coche1', 'Precio' => 1, 'Conductor_Correo' => 'emailej1D@dss.es']);
        $c_valid->save();
    }
}
