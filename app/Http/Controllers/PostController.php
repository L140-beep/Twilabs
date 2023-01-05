<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function create_post(Request $request){
        $id = $request->session()->get('id');

        $content = $request['content'];

        DB::table('posts')->insert([
            'user_id' => $id,
            'content' => $content,
        ]);


        return redirect('/');
    }
}
