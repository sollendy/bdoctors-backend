<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Star;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DoctorStarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $stars = Star::all();
        
        for ($i = 1; $i <= 50; $i++) {
            $doctor = Doctor::find($faker->numberBetween(1, 20));
            $selectedStar = $stars->random();
            $doctor->stars()->attach($selectedStar);
        }
    }
}
