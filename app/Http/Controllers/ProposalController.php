<?php

namespace App\Http\Controllers;

use App\Models\CoverLetter;
use App\Models\Job;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{

    public function store(Request $request, Job $job)
    {
        $proposal = Proposal::create([
            'job_id' => $job->id,
            'validated' => 0
        ]);
        CoverLetter::create([
            'proposal_id' => $proposal->id,
            'content' => $request->content
        ]);
        return redirect()->route('job.index');
    }

}
