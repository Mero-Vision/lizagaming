<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        $credential = $request->only('email', 'password');
        try {
            if (Auth::attempt($credential)) {
                $user = Auth::user();
                if ($user->status == 'admin') {
                   
                    return redirect('admin/dashboard')->with('success', 'Welcome ' . $user->name);
                } else {
                   

                    return back()->with('error', 'Invalid email or password!');
                }
            } else {
                return back()->with('error', 'Invalid email or password!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}