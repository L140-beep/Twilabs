<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function show(){
        return view('registration');
    }

    public function validate_registration(Request $request){

        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);

        $validated = $request->validate(
        [
            'username' => 'min:4|max:255',
            'login' => 'bail|required|email',
            'password' => 'bail|required|min:8|max:255',
        ]
        );


        $isNewUser = true;
        $emails = DB::table('users')->pluck('email');

        foreach($emails as $email){
            if($validated['login'] == $email){
                return view('registration', ['registration_error' => 'User with this email already exist!']);
            }
        }


        if ($isNewUser){
            DB::table('users') -> insert([
                'username' => $validated['username'],
                'email' => $validated['login'],
                'password' => $validated['password'],
            ]);

            return redirect('/auth');
        }


        return view('registration', ['registration_error' => 'Incorrect login or password!']);
        
    }
}
