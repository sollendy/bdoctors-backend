<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Star;

class StarController extends Controller
{
    
    public function store(Request $request, $id)
    {   

        $request->validate([
            'star_id' => ['required'],
            'profile_id'=> ['required']
        ]);
        
        $doctor = Profile::findOrFail($id);
        $star = Star::findOrFail($request->input('star_id'));

        $doctor->stars()->attach($star, ['created_at' => date('Y-m-d')]);

        return response()->json([
            'success' => true,
        ]);
    }
}

