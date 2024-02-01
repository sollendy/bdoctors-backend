<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $usersCount = 20;
        for ($i = 1; $i <= $usersCount; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => 'a' . $i . '@a.it',
                'email_verified_at' => now(),
                'password' => Hash::make('ciaociao'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
