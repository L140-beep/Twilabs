@extends('layout')
@section('title')
    Feed
@endsection

@section('content')
    <form method="POST" action='/new_post'>
        @csrf
        <input name='content' maxlength='255' type="text" placeholder="very interesting post...">
        <button type='submit'>Post</button>
    </form>

    @for($i = 0; $i < count($users); $i++)
        <br>
        <a href={{'/users/' . $users[$i]}}>{{$users[$i]}}</a> 
        <label> {{$posts[$i]->created_at}}</label>
        <br>
        {{$posts[$i]->content}} 
    @endfor

@endsection
