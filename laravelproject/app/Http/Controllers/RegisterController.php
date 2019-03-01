<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegisterController extends Controller
{
    
    public function index(){

        return view('users/register');
    }

    public function register(Request $request){

        $request->validate([
            'name'=>'required|unique:users',
            'password'=>'required',
            'confirm_password'=>'required',

        ]);

        $user = User::create([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),

        ]);

        \Auth::loginUsingId($user->id);

        return redirect()->route("posts");
    }
}
