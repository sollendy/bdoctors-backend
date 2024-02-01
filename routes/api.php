<?php

use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/doctors', [DoctorController::class, 'searchBySpecialization']);
Route::get('/doctor/{doctor}', [DoctorController::class, 'show']);
Route::post('/messages', [MessageController::class, 'store']);
