<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->all();

        $validator = Validator::make($validatedData, [
            'user_id' => 'nullable',
            'name' => 'nullable|max:50',
            'lastname' => 'nullable|max:50',
            'email' => 'nullable',
            'text' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $review = new Review();
        $review->fill($validatedData);
        $review->save();


        return response()->json(
            [
                'success' => true,
            ]
        );
    }

    
}
