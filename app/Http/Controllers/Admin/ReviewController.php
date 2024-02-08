<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;
        $doctor = Doctor::where('user_id', $userId)->first();
        $reviews = Review::where('doctor_id', $doctor->id)->orderBy('created_at', 'desc')->get();
        return view('admin.reviews', compact('reviews', 'doctor'));
    }
}
