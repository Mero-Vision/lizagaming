<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasswordManagementController extends Controller
{
    public function index(){
        $passwords=Password::latest()->get();
        return view('admin.password_management.password_management',compact('passwords'));
    }

    public function store(Request $request){

        try{
            $password=DB::transaction(function()use($request){
                $password=Password::create([
                    'user_id'=>auth()->user()->id,
                    'name'=>$request->name,
                    'url'=>$request->url,
                    'email'=>$request->email,
                    'password'=>$request->password
                    
                    
                ]);
                return $password;
                
            });
            if($password){
                return back()->with('success','Password saved successfully!');
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }
        
    }

    public function destroy($id){
        $password=Password::find($id);
        if(!$password){
            return back()->with('error','Password ID Not Found!');
        }

        
        try{
            $passwords=DB::transaction(function()use($password){
                $password->delete();
                return $password;
                
            });
            if($password){
                return back()->with('success','Password deleted successfully!');
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
        
        
    }
}