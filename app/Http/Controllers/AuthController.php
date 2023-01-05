<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AuthController extends Controller
{
    public function show(Request $request){
        if($request->session()->has('id')){
            return redirect('/');
        }
        return view('auth');
    }

    public function validate_login(Request $request){
        
        $users = DB::table('users')->get();
        
        foreach($users->all() as $user){
            if($user->email == $request['login'] && $user->password == $request['password']){
                DB::table('users')->where('email', $request['login'])->update(['last_visit_at' => Carbon::now()->toDateTimeString()]);
                session(['id' => $user->id, 'username' => $user->username]);
                return redirect('/');
            }
        }

        return view('auth', ['login_error' => 'Incorrect email or password']);   
    }

    public function exit(Request $request){
        $request->session()->flush();

        return redirect('auth');
    }
}