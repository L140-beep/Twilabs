<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AuthController extends Controller
{
    public function show(){
        return view('auth');
    }

    public function validate_login(Request $request){
        
        $users = DB::table('users')->get();
        
        foreach($users->all() as $user){
            if($user->email == $request['login'] && $user->password == $request['password']){
                DB::table('users')->where('email', $request['login'])->update(['last_visit_at' => Carbon::now()->toDateTimeString()]);
                return redirect('/');
            }
        }

        return view('auth', ['login_error' => 'Incorrect email or password']);   
    }
}