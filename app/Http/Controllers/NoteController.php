<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function index(){

      $notes=Note::latest()->get();
        return view('admin.note.note',compact('notes'));
    }

    public function store(Request $request)
    {

        try {
            $note = DB::transaction(function () use ($request) {
                $note = Note::create([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'note' => $request->note,
                  


                ]);
                return $note;
            });
            if ($note) {
                return back()->with('success', 'Note saved successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $password = Note::find($id);
        if (!$password) {
            return back()->with('error', 'Password ID Not Found!');
        }


        try {
            $passwords = DB::transaction(function () use ($password) {
                $password->delete();
                return $password;
            });
            if ($password) {
                return back()->with('success', 'Password deleted successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}