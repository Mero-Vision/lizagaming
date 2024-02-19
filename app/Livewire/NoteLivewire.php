<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteLivewire extends Component
{
    public $notes;
    public function render()
    {
        $this->notes = Note::latest()->get();
        return view('livewire.note-livewire');
    }
}