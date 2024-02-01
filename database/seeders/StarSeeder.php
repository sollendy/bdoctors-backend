<?php

namespace Database\Seeders;

use App\Models\Star;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stars = ['1', '2', '3', '4', '5'];

        for ($i = 0; $i < count($stars); $i++) {
            $newStar = new Star();
            $newStar->vote = $stars[$i];
            $newStar->save();
        }
    }
}
