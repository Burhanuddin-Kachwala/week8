<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;

class JobController extends Controller
{
    public function index()
    {
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
        // Validate input
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Jobs::create([
            "title" => request('title'),
            'salary' => request('salary'),
            'employer_id' => '1'
        ]);

        // Redirect jobs
        return redirect('/jobs');
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

        Jobs::create([
            "title" => request('title'),
            'salary' => request('salary'),
            'employer_id' => '1'
        ]);

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
