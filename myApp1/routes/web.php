<?php

use Illuminate\Support\Facades\Route;
use App\Models\Jobs;

Route::get('/', function () {
    // Home view
    return view('home');
});

Route::get('/contact', function () {
    // Contact view
    return view('contact');
});

Route::get('/jobs/create', function () {
    // Create job
    return view('jobs.create');
});

Route::get('/jobs', function () {
    // List jobs
    $jobs = Jobs::with('employer')->latest()->simplePaginate(6);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::post('/jobs', function () {
    // Validate input
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // store job
    Jobs::create([
        "title" => request('title'),
        'salary' => request('salary'),
        'employer_id' => '1'
    ]);

    // Redirect jobs
    return redirect('/jobs');
});

Route::get('/job/{id}', function ($id) {
    // Show job
    $job = Jobs::find($id);
    return view('jobs.show', [
        'job' => $job
    ]);
    
});

// edit
Route::get('/job/{id}/edit',function($id){
    $job = Jobs::find($id);
    return view('jobs.edit', [
        'job' => $job
    ]);
});
//update
Route::patch('/job/{id}', function ($id) {
   // Validate input
   request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    //update
    $job = Jobs::findOrFail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);
    return redirect('/job/'.$job->id);
});
//destroy
Route::delete('/job/{id}', function ($id) {
    $job = Jobs::findOrFail($id);
    $job->delete();
    return redirect('/jobs');
});

