<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        for ($i = 1; $i <= 50; $i++) {
            $newRewiew = new Review();
            $newRewiew->doctor_id = $faker->numberBetween(1, 20);
            $newRewiew->name_ui = $faker->text(25);
            $newRewiew->lastname_ui = $faker->text(25);
            $newRewiew->email_ui = $faker->email();
            $newRewiew->text = $faker->text;
            $newRewiew->save();
        }
    }
}
