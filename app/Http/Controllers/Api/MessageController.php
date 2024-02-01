<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = new Message();
        $message->doctor_id = $request->doctor_id;
        $message->name_ui = $request->input('name_ui');
        $message->lastname_ui = $request->input('lastname_ui');
        $message->email_ui = $request->input('email_ui');
        $message->text = $request->input('text');
        $message->save();
        return response()->json(['success' => true]);
    }
}
