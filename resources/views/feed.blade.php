@extends('layout')
@section('title')
    Feed
@endsection

@section('content')
    <form method="POST" action='/new_post'>
        @csrf
        <div>
            <input name='content' class='new_post' maxlength='255' type="text" placeholder="very interesting post...">
            <br>
            <button class='post-btn' type='submit'>Post</button>
        </div>
    </form>

    @for($i = 0; $i < count($users); $i++)
    <div class='post'>
        <br>
        <a class='nickname' href={{'/users/' . $users[$i]}}>{{$users[$i]}}</a> 
        <label class='created_at'> {{$posts[$i]->created_at}}</label>
        <br>
        {{$posts[$i]->content}}
    </div> 
    @endfor

@endsection
