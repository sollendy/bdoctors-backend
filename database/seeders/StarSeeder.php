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

        foreach ($stars as $star) {

            $newStar = new Star();
            $newStar->vote = $star;
            $newStar->save();
        }
    }
}
