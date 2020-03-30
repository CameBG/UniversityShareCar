<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Conductor;
use App\Coche;
use App\Slot;
use App\LineaSlot;
use App\Ruta;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LineaSlotTest extends TestCase
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
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4, 'Precio' => 1, 'Conductor_DNI' => '12345678A', 'Ruta_id' => $ruta_id]);
        Slot::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15']);
        
        $slotId = Conductor::query()->first()->coches()->first()->slots()->first();
        $this->assertEquals(1, $slotId->id);

        $plazas = Conductor::query()->first()->coches()->first()->Plazas;
        $this->assertEquals(4, $plazas);

        for($indice = 1; $indice <= $plazas; $indice++){
            LineaSlot::create(['Slot_id' => $slotId->id, 'numAsiento' => $indice]);
        }
        
        $conductor = LineaSlot::query()->first()->slot->coche->conductor;
        $this->assertEquals('Antonio', $conductor->Nombre);
    }

    public function numAsientos()
    {
        $cantidadPlazas = 7;
        Ruta::create(['Localidad' => 'Novelda', 'Universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['DNI' => '12345678A', 'Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com']);
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => $cantidadPlazas, 'Precio' => 1, 'Conductor_DNI' => '12345678A', 'Ruta_id' => $ruta_id]);
        Slot::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15']);
        
        $slotId = Slot::query()->first()->id;

        for($indice = 1; $indice <= $plazas; $indice++){
            LineaSlot::create(['Slot_id' => $slotId, 'numAsiento' => $indice]);
        }
        
        $cantidad = LineaSlot::query()->where('id', $slotId)->count();
        $this->assertEquals($cantidadPlazas, $cantidad);
    }

}
