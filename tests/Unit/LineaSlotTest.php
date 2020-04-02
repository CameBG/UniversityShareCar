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
    use DatabaseMigrations;

    public function testRecogerDatos()
    {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio', 'fechaNacimiento' => '1980-01-20', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        Coche::create(['matricula' => 'A1234BC', 'marca' => 'Mercedes', 'modelo' => 'modelo1', 'plazas' => 4, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'emailej1A@dss.es']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '08:15', 'direccion' => 'Ida', 'coche_matricula' => 'A1234BC']);
        
        $slot = Conductor::query()->first()->coches()->first()->slots()->first();
        $this->assertEquals(1, $slot->id);

        $plazas = Conductor::query()->first()->coches()->first()->plazas;
        $this->assertEquals(4, $plazas);

        for($indice = 1; $indice <= $plazas; $indice++){
            LineaSlot::create(['slot_id' => $slot->id, 'numAsiento' => $indice]);
        }
        
        // de linea sacas un slot, el coche y el conductor
        $conductor = LineaSlot::query()->first()->slot->coche->conductor;
        $this->assertEquals('Antonio', $conductor->nombre);

        // de un slot sacas una linea
        $linea = $slot->lineaSlots()->first();
        $this->assertEquals('1', $linea->numAsiento);
    }

    public function numAsientos()
    {
        $cantidadplazas = 7;
        
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['correo' => 'emailej1A@dss.es', 'nombre' => 'Antonio', 'fechaNacimiento' => '1980-01-20', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'punto1']);
        Coche::create(['matricula' => 'A1234BC', 'marca' => 'Mercedes', 'modelo' => 'modelo1', 'plazas' => $cantidadplazas, 'precioViaje' => 1, 'conductor_correo' => 'emailej1A@dss.es']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '08:15', 'direccion' => 'Ida', 'coche_matricula' => 'A1234BC']);
        
        $slotId = Slot::query()->first()->id;

        for($indice = 1; $indice <= $plazas; $indice++){
            LineaSlot::create(['slot_id' => $slotId, 'numAsiento' => $indice]);
        }
        
        $cantidad = LineaSlot::query()->where('id', $slotId)->count();
        $this->assertEquals($cantidadplazas, $cantidad);
    }
}
