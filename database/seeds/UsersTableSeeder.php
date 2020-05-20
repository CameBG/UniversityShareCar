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



        User::create(['email' => 'dani@ua.es', 'password' => Hash::make('dani')]);
        User::create(['email' => 'came@ua.es', 'password' => Hash::make('came')]);
        User::create(['email' => 'sandra@ua.es', 'password' => Hash::make('sandra')]);
        User::create(['email' => 'edgar@ua.es', 'password' => Hash::make('edgar')]);
        User::create(['email' => 'admin@ua.es', 'password' => Hash::make('admin')]);
    }
}
