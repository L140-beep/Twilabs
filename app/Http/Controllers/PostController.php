<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PostController extends Controller
{
    protected function find_username_by_id(Int $id, Users $users){
        foreach($users->all() as $user){
            if($user->id == $id){
                return $user->username; 
            }
        }
    }

    public function get_user_posts(Request $request, Users $user){
        $posts = DB::table('posts')->select('content', 'created_at')->where('user_id', '=', $user->id)->get();

        return view('layout_profile', ['id' => $user['id'], 'username' => $user['username'], 
                    'posts' => $posts, 'current_username' => $request->session()->get('username')]);
    }


    public function get_posts(Request $request){
        
        $users = new Users();
        $posts = new Posts();
        
        $usernames = array();
        $reversed = array();

        foreach($posts->all() as $post){
            array_push($usernames, $this->find_username_by_id($post->user_id, $users));
            array_push($reversed, $post);
        }

        return view('feed', ['posts' => array_reverse($reversed), 'users' => array_reverse($usernames), 'current_username' => $request->session()->get('username')]);
    }

    public function create_post(Request $request){
        $id = $request->session()->get('id');

        $content = $request['content'];
        
        DB::table('posts')->insert([
            'user_id' => $id,
            'content' => $content,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/');
    }
}
