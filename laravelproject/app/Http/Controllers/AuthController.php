<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;




class AuthController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'name'=>'required|unique:users',
            'password'=>'required_with:password_confirmation|same:confirmPassword',


        ]);
        $user = User::create([
            'name' => $request->name,
            'password' =>Hash::make($request->password),

        ]);

    $token = auth()->login($user);

    return $this->respondWithToken($token);
}

//////////////////////////////////////////////////////////////////////////

    public function login(Request $request){

        $request->validate([
            'name'=>'required',
            'password'=>'required',

        ]);
        $token = auth()->attempt(['name' => $request->name,'password'=> $request->password ]);
        if ($token) {
            return $this->respondWithToken($token);
        }
        return response()->json(['error' => 'Unauthorized'], 401);

    }

    protected function respondWithToken($token)
    {

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user'=>request()->user(),
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

}
