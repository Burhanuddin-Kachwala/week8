<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;
use App\Models\Jobs;


// Route to display the home page
Route::view('/', 'home');

// Route to display the contact page
Route::view('/contact', 'contact');
// Route::view('/jobs/create','jobs/create');

Route::get('/register',[RegisterUserController::class,'create']);
Route::post('/register',[RegisterUserController::class,'store']);

Route::get('/login',[SessionController::class,'create']);
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);

Route::resource('jobs',JobController::class);

