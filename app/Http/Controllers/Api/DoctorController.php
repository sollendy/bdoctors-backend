<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;

class DoctorController extends Controller
{
    public function searchBySpecialization()
{
    $doctors = Doctor::with(['typologies', 'reviews'])
        ->get();

    $doctors->load('stars');

    $doctors->each(function ($doctor) {
        $averageVote = optional($doctor->stars)->avg('vote');
        $roundedAverageVote = round($averageVote, 2);
        $doctor->setAttribute('average_vote', $roundedAverageVote);
    });

    return response()->json([
        'success' => true,
        'response' => $doctors
    ]);
}

    public function show(Doctor $doctor){
        $doctorWithReviewsAndStars = $doctor->load('reviews', 'stars');
        $averageVote = $doctor->stars->avg('vote');
        $roundedAverageVote = round($averageVote, 2);
        return response()->json([
            'success' => true,
            'response' => $doctorWithReviewsAndStars,
            'average_vote' => $roundedAverageVote,
        ]);
    }
}
