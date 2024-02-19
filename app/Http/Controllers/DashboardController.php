<?php

namespace App\Http\Controllers;

use App\Models\IndividualChat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users=User::get();
        return view('admin.dashboard',compact('users'));
    }

    public function show($userId){

        $messages = IndividualChat::where(function ($query) use ($userId) {
            $query->where('sender_id', auth()->id())->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }
}