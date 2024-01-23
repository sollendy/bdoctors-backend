<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timedate = now();
        $sponsorships = [
            [
            'name' => 'Bronze',
            'price' => 5.99,
            'duration' => $timedate->addHours(24)
            ],
            [
            'name' => 'Gold',
            'price' => 9.99,
            'duration' => now()->addHours(72)
            ],
            [
            'name' => 'Platinum',
            'price' => 15.99,
            'duration' => now()->addHours(144)
            ]
        ];

        foreach ($sponsorships as $sponsorship) {
            $newSponsorship = new Sponsorship();
            $newSponsorship->name = $sponsorship['name'];
            $newSponsorship->price = $sponsorship['price'];
            $newSponsorship->duration = $sponsorship['duration'];
            $newSponsorship->save();
        }
    }

}
