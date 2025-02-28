<?php

use Illuminate\Support\Facades\Route;

use App\Models\Jobs;


Route::get('/', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/jobs', function () {
  
    return view('jobs',[
        'jobs'=>Jobs::all()
    ]);
});
Route::get('/job/{id}', function ($id) {
    
    $job = Jobs::find($id);
            return view('job',[
                'job'=>$job
            ]);
   
});
