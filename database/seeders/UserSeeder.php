<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create(['name' => 'Carmelo', 'lastname' => 'Leone', 'email' => 'carmelo@leone.com', 'password' => Hash::make('password'),]);
        User::create(['name' => 'Edoardo', 'lastname' => 'Lannino', 'email' => 'edoardo@lannino.com', 'password' => Hash::make('password'),]);
        User::create(['name' => 'Francesco', 'lastname' => 'Falanga', 'email' => 'francesco@falanga.com', 'password' => Hash::make('password'),]);
        User::create(['name' => 'Francesco', 'lastname' => 'Trudu', 'email' => 'francesco@trudu.com', 'password' => Hash::make('password'),]);
        User::create(['name' => 'Luca', 'lastname' => 'Cirigliano', 'email' => 'luca@cirigliano.com', 'password' => Hash::make('password'),]);
        User::create(['name' => 'Massimiliano', 'lastname' => 'Fanizza', 'email' => 'massimiliano@fanizza.com', 'password' => Hash::make('password'),]);
        User::create(['name' => 'Massimiliano', 'lastname' => 'Novello', 'email' => 'massimiliano@novello.com', 'password' => Hash::make('password'),]);
    }
}
