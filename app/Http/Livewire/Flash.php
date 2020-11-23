<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Flash extends Component
{
    protected $listeners = ['flash' => 'setFlashMessage'];

    public $message;
    public $type;

    public $colors = [
        'error' => 'border-red-700 text-red-700 bg-red-200',
        'succes' => 'border-green-700 text-green-700 bg-green-200'
    ];

    public function setFlashMessage($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
        $this->dispatchBrowserEvent('flash-message');
    }

    public function render()
    {
        return view('livewire.flash');
    }
}
