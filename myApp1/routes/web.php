<?php

use App\Models\Jobs;
use App\Mail\JobsPosted;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;
use App\Jobs\TranslateJobs;

Route::get('test', function () {
    $job = Jobs::first();

    TranslateJobs::dispatch($job);

    return 'Done';
});
// Route to display the home page
Route::view('/', 'home');

// Route to display the contact page
Route::view('/contact', 'contact');
// Route::view('/jobs/create','jobs/create');


// Route to display a list of jobs
Route::get('/jobs', [JobController::class, 'index']);

// Route to show the form for creating a new job
Route::get('/jobs/create', [JobController::class, 'create']);

// Route to store a newly created job in storage
Route::post('/jobs', [JobController::class, 'store'])
    ->middleware('auth');

// Route to display the specified job
Route::get('/jobs/{job}', [JobController::class, 'show']);
   
   

// Route to show the form for editing the specified job
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');


// Route to update the specified job in storage
Route::patch('/jobs/{job}', [JobController::class, 'update']);
   
// Route to remove the specified job from storage
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);
