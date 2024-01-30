<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Typology;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        $doctors = User::with(['profile', 'profile.typologies'])
            ->orderBy('name', 'asc')
            ->get();
        
        return response()->json([
            'success' => true,
            'response' => $doctors
        ]);
    }

    public function show(){
        
    }
}
