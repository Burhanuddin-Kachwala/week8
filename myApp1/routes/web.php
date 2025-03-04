<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Jobs;


// Route to display the home page
Route::view('/', 'home');

// Route to display the contact page
Route::view('/contact', 'contact');

Route::resource('jobs',JobController::class);
