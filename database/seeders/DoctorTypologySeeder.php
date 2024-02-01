<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DoctorTypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = Doctor::all();
        $typologies = Typology::all();

        foreach ($doctors as $doctor) {
            $selectedTipologies = $typologies->random();
            $doctor->typologies()->attach($selectedTipologies);
        }
    }
}
