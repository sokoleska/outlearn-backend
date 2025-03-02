<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// courses board
Route::get('/courses', [UserController::class, 'get_courses']);
// learning mode
Route::get('/courses/{id}', [UserController::class, 'get_course']);
// preview mode

// user profile and dashboard
Route::get('/student_profile', [UserController::class, 'student_info']);
// leaderboard
Route::get('/leaderboard', [UserController::class, 'leaderboard']);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});