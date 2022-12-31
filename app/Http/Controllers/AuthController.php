<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function show(){
        return view('auth');
    }

    public function validate_login(Request $request){
        $validated = $request->validate(
            [
                'login' => 'bail|required|email',
                'password' => 'bail|required|min:8|max:255',
            ]
            );
        

    }
}