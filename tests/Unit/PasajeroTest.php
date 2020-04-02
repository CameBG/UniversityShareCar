<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Conductor;
use App\Coche;
use App\Slot;
use App\LineaSlot;
use App\Pasajero;
use App\Ruta;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PasajeroTest extends TestCase
{
    use DatabaseMigrations;

    public function testRecogerDatos()
    {
        Ruta::create(['localidad' => 'Novelda', 'universidad' => 'UA']);
        $ruta_id = Ruta::query()->first()->id;
        Conductor::create(['nombre' => 'Antonio', 'fechaNacimiento' => '1980-01-20', 'correo' => 'antonio@dss.com', 'ruta_id' => $ruta_id, 'puntoRecogida' => 'casa']);
        Coche::create(['matricula' => 'A1234BC', 'marca' => 'Mercedes', 'modelo' => 'modelo1', 'plazas' => 4, 'nombre' => 'Coche1', 'precioViaje' => 1, 'conductor_correo' => 'antonio@dss.com']);
        Slot::create(['fecha' => '2020-02-21', 'hora' => '08:15', 'direccion' => 'Ida', 'coche_matricula' => 'A1234BC']);  
        Pasajero::create(['correo' => 'estefania@dss.com', 'nombre' => 'Estefania', 'fechaNacimiento' => '1980-01-25', 'genero' => 'Mujer', 'rutaImagen' => 'ruta/imagen.png', 'telefono' => '666666666']);
    
        $pasajero = Pasajero::query()->first();

        $this->assertEquals('estefania@dss.com', $pasajero->correo);
        $this->assertEquals('Estefania', $pasajero->nombre);
        $this->assertEquals('1980-01-25', $pasajero->fechaNacimiento);  
        $this->assertEquals('Mujer', $pasajero->genero);
        $this->assertEquals('ruta/imagen.png', $pasajero->rutaImagen);
        $this->assertEquals('666666666', $pasajero->telefono);

        $slotId = Slot::query()->first()->id;

        $plazas = Conductor::query()->first()->coches()->first()->plazas;

        for($indice = 1; $indice <= $plazas; $indice++){
            if($indice == 3) {
                LineaSlot::create(['slot_id' => $slotId, 'numAsiento' => $indice, 'pasajero_correo' => $pasajero->correo]);
            }
            else {
                LineaSlot::create(['slot_id' => $slotId, 'numAsiento' => $indice]);
            }     
        }

        $linea_pasajero = LineaSlot::query()->where('numAsiento', 3)->first()->pasajero;
        $this->assertEquals('estefania@dss.com', $linea_pasajero->correo);

        $linea_vacia = LineaSlot::query()->where('numAsiento', 2)->first();
        $this->assertEquals(null, $linea_vacia->pasajero_correo);

        $pasajero_linea = Pasajero::query()->first()->lineaSlots()->first();
        $this->assertEquals(3, $pasajero_linea->numAsiento);
    }
}
