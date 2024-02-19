<?php

namespace App\Livewire;

use App\Models\IndividualChat;
use App\Models\User;
use Livewire\Component;

class ChatLivewire extends Component
{
    public $users;
    public $chatUserId;
    public $chatting = false; 
    public $chatMessages;// Variable to control chat message visibility

    public function chat($userId = null)
    {
        $this->chatUserId = $userId;
        $this->chatting = true; 
        dd($userId);// Show chat messages when a user is clicked
    }

    public function render()
    {
        $this->users = User::get();

       
        if ($this->chatUserId) {
            $this->chatting = true; 
            $this->chatMessages = IndividualChat::where('receiver_id', $this->chatUserId)->first();
        } else {
            $this->chatting = false; 
        }

        return view('livewire.chat-livewire');
    }
}