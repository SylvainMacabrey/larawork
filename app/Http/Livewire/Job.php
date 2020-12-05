<?php

namespace App\Http\Livewire;

use App\Notifications\JobLiked;
use Livewire\Component;

class Job extends Component
{
    public $job;

    public function like()
    {
        if(auth()->check()) {
            $response = auth()->user()->likes()->toggle($this->job->id);
            if($response['attached']) {
                $this->job->user->notify(new JobLiked($this->job));
            }
        } else {
            $this->emit('flash', 'Merci de vous connecter', 'error');
        }
    }

    public function render()
    {
        return view('livewire.job');
    }
}
