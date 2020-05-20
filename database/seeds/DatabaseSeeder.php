<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(RutasTableSeeder::class);
        $this->call(ConductorsTableSeeder::class);
        $this->call(CochesTableSeeder::class);
        $this->call(SlotsTableSeeder::class);
        $this->call(PasajerosTableSeeder::class);
        $this->call(LineaSlotsTableSeeder::class);
    }
}
