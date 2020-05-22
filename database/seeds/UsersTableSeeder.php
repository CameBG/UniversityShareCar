<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->delete();



        User::create(['email' => 'dani@ua.es',       'password' => Hash::make('dani')]);
        User::create(['email' => 'came@ua.es',       'password' => Hash::make('came')]);
        User::create(['email' => 'sandra@ua.es',     'password' => Hash::make('sandra')]);
        User::create(['email' => 'edgar@ua.es',      'password' => Hash::make('edgar')]);
        User::create(['email' => 'admin@ua.es',      'password' => Hash::make('admin')]);

        User::create(['email' => 'emailej1A@dss.es', 'password' => Hash::make('emailej1A')]);
        User::create(['email' => 'emailej1B@dss.es', 'password' => Hash::make('emailej1B')]);
        User::create(['email' => 'emailej1C@dss.es', 'password' => Hash::make('emailej1C')]);
        User::create(['email' => 'emailej1D@dss.es', 'password' => Hash::make('emailej1D')]);
        User::create(['email' => 'emailej1E@dss.es', 'password' => Hash::make('emailej1E')]);
        User::create(['email' => 'emailej1F@dss.es', 'password' => Hash::make('emailej1F')]);
        User::create(['email' => 'emailej1G@dss.es', 'password' => Hash::make('emailej1G')]);
        User::create(['email' => 'emailej1H@dss.es', 'password' => Hash::make('emailej1H')]);
        User::create(['email' => 'emailej1I@dss.es', 'password' => Hash::make('emailej1I')]);
        User::create(['email' => 'emailej1J@dss.es', 'password' => Hash::make('emailej1J')]);
        User::create(['email' => 'emailej1K@dss.es', 'password' => Hash::make('emailej1K')]);
        User::create(['email' => 'emailej1L@dss.es', 'password' => Hash::make('emailej1L')]);
        User::create(['email' => 'emailej1M@dss.es', 'password' => Hash::make('emailej1M')]);
        User::create(['email' => 'emailej1N@dss.es', 'password' => Hash::make('emailej1N')]);
        User::create(['email' => 'emailej1O@dss.es', 'password' => Hash::make('emailej1O')]);
        User::create(['email' => 'emailej1P@dss.es', 'password' => Hash::make('emailej1P')]);
        User::create(['email' => 'emailej1Q@dss.es', 'password' => Hash::make('emailej1Q')]);

        User::create(['email' => 'tudor@dss.com',    'password' => Hash::make('tudor')]);
        User::create(['email' => 'paco@dss.com',     'password' => Hash::make('paco')]);
        User::create(['email' => 'jose@dss.com',     'password' => Hash::make('jose')]);
        User::create(['email' => 'fran@dss.com',     'password' => Hash::make('fran')]);
        User::create(['email' => 'sofia@dss.com',    'password' => Hash::make('sofia')]);
        User::create(['email' => 'felipe@dss.com',   'password' => Hash::make('felipe')]);
        User::create(['email' => 'estefania@dss.com','password' => Hash::make('estefania')]);
        User::create(['email' => 'roberto@dss.com',  'password' => Hash::make('roberto')]);
        User::create(['email' => 'fernando@dss.com', 'password' => Hash::make('fernando')]);
        User::create(['email' => 'alejandra@dss.com','password' => Hash::make('alejandra')]);
        User::create(['email' => 'maria@dss.com',    'password' => Hash::make('maria')]);
        User::create(['email' => 'lorena@dss.com',   'password' => Hash::make('lorena')]);
        User::create(['email' => 'sara@dss.com',     'password' => Hash::make('sara')]);
        User::create(['email' => 'came@dss.com',     'password' => Hash::make('came')]);
        User::create(['email' => 'sandra@dss.com',   'password' => Hash::make('sandra')]);
        User::create(['email' => 'edgar@dss.com',    'password' => Hash::make('edgar')]);
        User::create(['email' => 'dani@dss.com',     'password' => Hash::make('dani')]);
    
    }
}
