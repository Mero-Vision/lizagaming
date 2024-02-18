<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordManagementController extends Controller
{
    public function index(){
        return view('admin.password_management.password_management');
    }
}