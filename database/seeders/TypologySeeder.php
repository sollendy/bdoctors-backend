<?php

namespace Database\Seeders;

use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typology = ['Cardiologo', 'Oncologo', 'Ortopedico', 'Chirurgo', 'Pneumologo'];

        for ($i = 0; $i < count($typology); $i++) {
            $newTypology = new Typology();
            $newTypology->name = $typology[$i];
            $newTypology->save();
        }
    }
}
