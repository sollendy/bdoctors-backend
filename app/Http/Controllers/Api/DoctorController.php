<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;

class DoctorController extends Controller
{
    private function getAverageVote($doctor)
    {
        $doctor->load('stars');
        $averageVote = optional($doctor->stars)->avg('vote');
        return round($averageVote, 2);
    }

    public function searchBySpecialization()
{
    $doctors = Doctor::with(['typologies', 'reviews'])
        ->get();
    $doctors->load('stars');

    $doctors->each(function ($doctor) {
            $doctor->setAttribute('average_vote', $this->getAverageVote($doctor));
        });
    return response()->json([
        'success' => true,
        'response' => $doctors
    ]);
}

    public function show(Doctor $doctor){
        $doctorWithReviewsAndStars = $doctor->load('reviews', 'stars');
        $averageVote = $this->getAverageVote($doctor);
        return response()->json([
            'success' => true,
            'response' => $doctorWithReviewsAndStars,
            'average_vote' => $averageVote,
        ]);
    }
}
