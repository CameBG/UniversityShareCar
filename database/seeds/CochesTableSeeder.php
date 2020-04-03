<?php

use Illuminate\Database\Seeder;
use App\Coche;
use App\Ruta;

class CochesTableSeeder extends Seeder
{
    public function run()
    {
        Coche::query()->delete();

        Coche::create(['matricula' => 'A1234BC', 'nombre' => 'Coche1', 'marca' => 'Mercedes', 'modelo' => 'modelo1',     'plazas' => 4, 'precioViaje' => 1,   'conductor_correo' => 'emailej1A@dss.es', 'rutaImagen' => 'A1234BC.jpg']);
        Coche::create(['matricula' => 'X5678YZ', 'nombre' => 'Coche2', 'marca' => 'Hyundai',  'modelo' => 'modeloX',     'plazas' => 4, 'precioViaje' => 1.5, 'conductor_correo' => 'emailej1A@dss.es']);
        Coche::create(['matricula' => 'X12345Z', 'nombre' => 'Coche3', 'marca' => 'Hyundai',  'modelo' => 'modelo3',     'plazas' => 8, 'precioViaje' => 1.5, 'conductor_correo' => 'emailej1A@dss.es', 'rutaImagen' => 'X12345Z.jpg']);
        Coche::create(['matricula' => 'X67890Z', 'nombre' => 'Coche4', 'marca' => 'Hyundai',  'modelo' => 'modelo4',     'plazas' => 5, 'precioViaje' => 1.5, 'conductor_correo' => 'emailej1A@dss.es', 'rutaImagen' => 'X67890Z.jpg']);
        Coche::create(['matricula' => 'X00000Z', 'nombre' => 'Coche5', 'marca' => 'Hyundai',  'modelo' => 'modelo5',     'plazas' => 7, 'precioViaje' => 1.5, 'conductor_correo' => 'emailej1A@dss.es']);
        Coche::create(['matricula' => 'X11111Z', 'nombre' => 'Coche6', 'marca' => 'Hyundai',  'modelo' => 'modelo6',     'plazas' => 3, 'precioViaje' => 1.5, 'conductor_correo' => 'emailej1A@dss.es']);
        Coche::create(['matricula' => 'X22222Z', 'nombre' => 'Coche7', 'marca' => 'Hyundai',  'modelo' => 'modelo7',     'plazas' => 4, 'precioViaje' => 1.5, 'conductor_correo' => 'emailej1A@dss.es', 'rutaImagen' => 'X22222Z.jpg']);
        Coche::create(['matricula' => 'HI5102R', 'nombre' => 'Coche1', 'marca' => 'Mercedes', 'modelo' => 'modeloL',     'plazas' => 4, 'precioViaje' => 1.5, 'conductor_correo' => 'emailej1K@dss.es']);
        Coche::create(['matricula' => 'ON4328A', 'nombre' => 'Coche1', 'marca' => 'Dacia',    'modelo' => 'modeloG',     'plazas' => 3, 'precioViaje' => 1,   'conductor_correo' => 'emailej1L@dss.es']);
        Coche::create(['matricula' => 'RT5555A', 'nombre' => 'Coche1', 'marca' => 'Mercedes', 'modelo' => 'modeloPeque', 'plazas' => 2, 'precioViaje' => 1,   'conductor_correo' => 'emailej1B@dss.es']);
        Coche::create(['matricula' => 'LL3333P', 'nombre' => 'Coche1', 'marca' => 'Honda',    'modelo' => 'modelo5',     'plazas' => 4, 'precioViaje' => 1,   'conductor_correo' => 'emailej1C@dss.es']);
        Coche::create(['matricula' => 'XD4141D', 'nombre' => 'Coche1', 'marca' => 'Subaru',   'modelo' => 'modelo7A',    'plazas' => 4, 'precioViaje' => 1.5, 'conductor_correo' => 'emailej1D@dss.es']);
        Coche::create(['matricula' => 'B1234CD', 'nombre' => 'Coche1', 'marca' => 'Audi',     'modelo' => 'modelo1',     'plazas' => 3, 'precioViaje' => 2,   'conductor_correo' => 'emailej1E@dss.es']);
        Coche::create(['matricula' => 'C1905BG', 'nombre' => 'Coche1', 'marca' => 'Dacia',    'modelo' => 'modeloX',     'plazas' => 3, 'precioViaje' => 1,   'conductor_correo' => 'emailej1F@dss.es']);
        Coche::create(['matricula' => 'MP1808A', 'nombre' => 'Coche1', 'marca' => 'Skoda',    'modelo' => 'modeloS',     'plazas' => 3, 'precioViaje' => 1,   'conductor_correo' => 'emailej1J@dss.es']);
        Coche::create(['matricula' => 'AV3032V', 'nombre' => 'Coche2', 'marca' => 'Honda',    'modelo' => 'modeloF',     'plazas' => 4, 'precioViaje' => 2,   'conductor_correo' => 'emailej1J@dss.es']);
        Coche::create(['matricula' => 'GB5456D', 'nombre' => 'Coche1', 'marca' => 'Ford',     'modelo' => 'modeloJ',     'plazas' => 4, 'precioViaje' => 1,   'conductor_correo' => 'emailej1H@dss.es']);
        Coche::create(['matricula' => 'A8754MS', 'nombre' => 'Coche1', 'marca' => 'BMW',      'modelo' => 'modeloP',     'plazas' => 3, 'precioViaje' => 1,   'conductor_correo' => 'emailej1I@dss.es']);
        Coche::create(['matricula' => 'D8862AD', 'nombre' => 'Coche2', 'marca' => 'Hyundai',  'modelo' => 'modeloZ',     'plazas' => 4, 'precioViaje' => 1,   'conductor_correo' => 'emailej1I@dss.es']);
        Coche::create(['matricula' => 'GI0111S', 'nombre' => 'Coche1', 'marca' => 'Audi',     'modelo' => 'modeloQ',     'plazas' => 4, 'precioViaje' => 1,   'conductor_correo' => 'emailej1P@dss.es']);
        Coche::create(['matricula' => 'AA1919M', 'nombre' => 'Coche1', 'marca' => 'Jeep',     'modelo' => 'modeloG',     'plazas' => 3, 'precioViaje' => 2,   'conductor_correo' => 'emailej1Q@dss.es']);
        Coche::create(['matricula' => 'EP1803H', 'nombre' => 'Coche1', 'marca' => 'Volvo',    'modelo' => 'modeloQ',     'plazas' => 4, 'precioViaje' => 1,   'conductor_correo' => 'emailej1O@dss.es']);
    }
}
