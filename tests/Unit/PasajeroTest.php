<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Conductor;
use App\Coche;
use App\Slot;
use App\LineaSlot;
use App\Pasajero;
use App\Ruta;
use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Database\QueryException;

class PasajeroTest extends TestCase
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
        Conductor::create(['Nombre' => 'Antonio', 'Edad' => 20, 'Correo' => 'antonio@dss.com', 'Punto_de_Recogida' => 'casa', 'Ruta_id' => $ruta_id]);
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1', 'Plazas' => 4, 'Precio' => 1, 'Conductor_Correo' => 'antonio@dss.com']);
        Slot::create(['Fecha' => '2020-02-21', 'Tipo_viaje' => 'Ida', 'Coche_Matricula' => 'A1234BC', 'Hora' => '08:15']);  
        Pasajero::create(['DNI' => '11111111E', 'Nombre' => 'Estefania', 'Edad' => 33, 'Correo' => 'estefania@dss.com']);
        
        $pasajero = Pasajero::query()->first();

        $this->assertEquals('11111111E', $pasajero->DNI);
        $this->assertEquals("Estefania", $pasajero->Nombre);
        $this->assertEquals(33, $pasajero->Edad);
        $this->assertEquals("estefania@dss.com", $pasajero->Correo);

        $slotId = Slot::query()->first()->id;

        $plazas = Conductor::query()->first()->coches()->first()->Plazas;

        for($indice = 1; $indice <= $plazas; $indice++){
            if($indice == 3) {
                LineaSlot::create(['Slot_id' => $slotId, 'numAsiento' => $indice, 'Pasajero_id' => $pasajero->DNI]);
            }
            else {
                LineaSlot::create(['Slot_id' => $slotId, 'numAsiento' => $indice]);
            }     
        }

        $linea_pasajero = LineaSlot::query()->where('numAsiento', 3)->first()->pasajero;
        $this->assertEquals('11111111E', $linea_pasajero->DNI);

        $linea_vacia = LineaSlot::query()->where('numAsiento', 2)->first();
        $this->assertEquals(null, $linea_vacia->Pasajero_id);

        $pasajero_linea = Pasajero::query()->first()->lineaSlots()->first();
        $this->assertEquals(3, $pasajero_linea->numAsiento);
    }
}
