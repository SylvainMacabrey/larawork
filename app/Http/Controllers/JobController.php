<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $jobs =  Job::online()->latest()->get();
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function show(Job $job)
    {
        $user = User::find($job->user_id);
        return view('jobs.show', ['job' => $job, 'job.user' => $user]);
    }

}
