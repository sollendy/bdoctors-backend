<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;
        $doctor = Doctor::where('user_id', $userId)->first();
        $messages = Message::where('doctor_id', $doctor->id)->get();
        return view('admin.messages', compact('messages', 'doctor'));
    }
}
