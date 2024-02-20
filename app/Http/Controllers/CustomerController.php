<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index(){
        $users = User::get();
        return view('admin.customers.customer',compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required'],
            'email'=>['required',Rule::unique('customers','email')],
            'mobile_no' => ['required', Rule::unique('customers', 'mobile_no')],
            'social_media_link'=>['required','string']
            
        ]);

        try {
            $customer = DB::transaction(function () use ($request) {
                $customer = Customer::create([
                    'user_id' => auth()->user()->id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'social_media_link' => $request->social_media_link,
                    'mobile_no' => $request->mobile_no,
                    'country' => $request->country


                ]);
                return $customer;
            });
            if ($customer) {
                return back()->with('success', 'Customer saved successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}