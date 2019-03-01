<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;


class LoginController extends Controller
{

    public function index(){

       
        return view('users/login');
    }

    public function login(Request $request){

        $request->validate([
            'name'=>'required',
            'password'=>'required',
            
            ]);

       
   if (Auth::attempt(['name' => $request->name,'password'=> $request->password ])){
       
        
         return redirect()->route('posts');
    
     }

     else{
        return redirect('users/login');
     }

    }

    public function logout(){

                Auth::logout(); 
          
            return redirect('/'); 
           
    }



}
