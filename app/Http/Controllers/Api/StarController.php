<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Star;
use Illuminate\Support\Facades\Validator;

class StarController extends Controller
{
    
    public function store(Request $request, $id)
{   
    // Validate request data
    $request->validate([
        'star_id' => ['required'],
        'profile_id' => ['required']
    ]);

    // Find the profile and star
    $doctor = Profile::findOrFail($id);
    $star = Star::findOrFail($request->input('star_id'));

    // Attach star to the profile with the specified created_at value
    $doctor->stars()->attach($star, ['created_at' => now()]);

    return response()->json([
        'success' => true,
    ]);
}
}

