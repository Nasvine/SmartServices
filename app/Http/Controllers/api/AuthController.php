<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        $attrs = $request->validate([
            'email'   => 'required|email',
            'password'   => 'required|min:6',
        ]);

        if(!Auth::attempt($attrs)){
            return response([
                    'message' => 'Invalid credentials'
                ], 403);
        }
        
        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken,
        ], 200);
    }
}
