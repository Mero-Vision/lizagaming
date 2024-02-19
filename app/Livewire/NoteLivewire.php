<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteLivewire extends Component
{
    public $notes;
    public $word;
    public function render()
    {

        if (!empty($this->word)) {
            $this->notes = Note::where('title', 'like', '%' . $this->word . '%')
            ->orWhere('note', 'like', '%' . $this->word . '%')->get();
        } else {
            // Fetch 5 random words when the search input is empty
            $this->notes =
            Note::latest()->get();
        }

        return view('livewire.note-livewire');
    }
}