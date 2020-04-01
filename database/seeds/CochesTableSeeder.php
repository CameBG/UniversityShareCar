<?php

use Illuminate\Database\Seeder;
use App\Coche;
use App\Ruta;

class CochesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coche::create(['Matricula' => 'A1234BC', 'Marca' => 'Mercedes', 'Modelo' => 'modelo1',     'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1,   'Conductor_Correo' => 'emailej1A@dss.es']);
        Coche::create(['Matricula' => 'X5678YZ', 'Marca' => 'Hyundai',  'Modelo' => 'modeloX',     'Plazas' => 4, 'Nombre' => 'Coche2', 'Precio' => 1.5, 'Conductor_Correo' => 'emailej1A@dss.es']);
        Coche::create(['Matricula' => 'HI5102R', 'Marca' => 'Mercedes', 'Modelo' => 'modeloL',     'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1.5, 'Conductor_Correo' => 'emailej1K@dss.es']);
        Coche::create(['Matricula' => 'ON4328A', 'Marca' => 'Dacia',    'Modelo' => 'modeloG',     'Plazas' => 3, 'Nombre' => 'Coche1', 'Precio' => 1,   'Conductor_Correo' => 'emailej1L@dss.es']);

        Coche::create(['Matricula' => 'RT5555A', 'Marca' => 'Mercedes', 'Modelo' => 'modeloPeque', 'Plazas' => 2, 'Nombre' => 'Coche1', 'Precio' => 1,   'Conductor_Correo' => 'emailej1B@dss.es']);
        Coche::create(['Matricula' => 'LL3333P', 'Marca' => 'Honda',    'Modelo' => 'modelo5',     'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1,   'Conductor_Correo' => 'emailej1C@dss.es']);
        Coche::create(['Matricula' => 'XD4141D', 'Marca' => 'Subaru',   'Modelo' => 'modelo7A',    'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1.5, 'Conductor_Correo' => 'emailej1D@dss.es']);
        Coche::create(['Matricula' => 'B1234CD', 'Marca' => 'Audi',     'Modelo' => 'modelo1',     'Plazas' => 3, 'Nombre' => 'Coche1', 'Precio' => 2,   'Conductor_Correo' => 'emailej1E@dss.es']);
        Coche::create(['Matricula' => 'C1905BG', 'Marca' => 'Dacia',    'Modelo' => 'modeloX',     'Plazas' => 3, 'Nombre' => 'Coche1', 'Precio' => 1,   'Conductor_Correo' => 'emailej1F@dss.es']);
        Coche::create(['Matricula' => 'MP1808A', 'Marca' => 'Skoda',    'Modelo' => 'modeloS',     'Plazas' => 3, 'Nombre' => 'Coche1', 'Precio' => 1,   'Conductor_Correo' => 'emailej1J@dss.es']);

        Coche::create(['Matricula' => 'AV3032V', 'Marca' => 'Honda',    'Modelo' => 'modeloF',     'Plazas' => 4, 'Nombre' => 'Coche2', 'Precio' => 2,   'Conductor_Correo' => 'emailej1J@dss.es']);
        Coche::create(['Matricula' => 'GB5456D', 'Marca' => 'Ford',     'Modelo' => 'modeloJ',     'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1,   'Conductor_Correo' => 'emailej1H@dss.es']);
        Coche::create(['Matricula' => 'A8754MS', 'Marca' => 'BMW',      'Modelo' => 'modeloP',     'Plazas' => 3, 'Nombre' => 'Coche1', 'Precio' => 1,   'Conductor_Correo' => 'emailej1I@dss.es']);
        Coche::create(['Matricula' => 'D8862AD', 'Marca' => 'Hyundai',  'Modelo' => 'modeloZ',     'Plazas' => 4, 'Nombre' => 'Coche2', 'Precio' => 1,   'Conductor_Correo' => 'emailej1I@dss.es']);

        Coche::create(['Matricula' => 'GI0111S', 'Marca' => 'Audi',     'Modelo' => 'modeloQ',     'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1,   'Conductor_Correo' => 'emailej1P@dss.es']);
        Coche::create(['Matricula' => 'AA1919M', 'Marca' => 'Jeep',     'Modelo' => 'modeloG',     'Plazas' => 3, 'Nombre' => 'Coche1', 'Precio' => 2,   'Conductor_Correo' => 'emailej1Q@dss.es']);
        Coche::create(['Matricula' => 'EP1803H', 'Marca' => 'Volvo',    'Modelo' => 'modeloQ',     'Plazas' => 4, 'Nombre' => 'Coche1', 'Precio' => 1,   'Conductor_Correo' => 'emailej1O@dss.es']);
    }
}
