<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\User;
use App\Mail\JobsPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
        {
            if(Auth::guest()){
                return redirect('/login');
            }
            
        $jobs = Jobs::with('employer')->latest()->simplePaginate(6);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function show(Jobs $job)
    {
        
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function create()
    {        
       
        return view('/jobs.create');
    }

    public function edit(Jobs $job)
    {      
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function store(Request $request)
    {
        // Validate input
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job =Jobs::create([
            "title" => request('title'),
            'salary' => request('salary'),
            'employer_id' => '11'
        ]);
        Mail::to($job->employer->user)->queue(
            new JobsPosted($job)
        );

        // Redirect jobs
        return redirect('/jobs');
    }

    public function update(Jobs $job)
    {
        // Validate input
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Jobs $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
