<?php

namespace App\Http\Controllers;

use App\Models\GamePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GamePasswordManagementController extends Controller
{
    public function index(){

        $gamePasswords = GamePassword::latest()->get();

        
        return view('admin.game_password_management.game_password_management',compact('gamePasswords'));
    }


    public function store(Request $request)
    {

        try {
            $password = DB::transaction(function () use ($request) {
                $password = GamePassword::create([
                    'user_id' => auth()->user()->id,
                    'name' => $request->name,
                    'url' => $request->url,
                    'email' => $request->email,
                    'password' => $request->password


                ]);
                return $password;
            });
            if ($password) {
                return back()->with('success', 'Password saved successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $password = GamePassword::find($id);
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