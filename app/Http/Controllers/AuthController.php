<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    public function show(){
        return view('auth');
    }

    public function validate_login(Request $request){
        
        $users = DB::table('users')->get();
        
        foreach($users->all() as $user){
            if($user->email == $request['login'] && $user->password == $request['password']){
                return redirect('/');
            }
        }

        return view('auth', ['login_error' => 'Incorrect email or password']);   
    }
}