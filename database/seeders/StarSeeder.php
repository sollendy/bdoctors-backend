<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Star;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stars = ['1', '2', '3', '4', '5'];

        foreach ($stars as $star) {

            $newStar = new Star();
            $newStar->vote = $star;
            $newStar->save();
        }
    }
}
