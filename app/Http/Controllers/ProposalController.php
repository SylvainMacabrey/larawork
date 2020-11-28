<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\CoverLetter;
use App\Models\Job;
use App\Models\Message;
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

    public function confirm(Request $request)
    {
        $proposal = Proposal::findOrFail($request->proposal);
        if($proposal->job->user->id !== auth()->user()->id) {
            dd("nope");
        }
        $proposal->fill(['validated' => 1]);
        if($proposal->isDirty()) {
            $proposal->save();
            $conversation = Conversation::create([
                'from_id' => auth()->user()->id,
                'to_id' => $proposal->user->id,
                'job_id' => $proposal->job_id
            ]);
            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'content' => "Bonjour, j'ai validé votre offre"
            ]);
            return redirect()->route('job.index');
        }
    }

}
