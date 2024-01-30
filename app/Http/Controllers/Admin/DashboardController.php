<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $doctor = Doctor::with('typologies')->find(Auth::user()->id);
        return view('admin.dashboard', compact('doctor', 'user'));
    }
}