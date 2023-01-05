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


    @foreach($posts as $post)
        {{$post->id}}
        <br>
        {{$post->content}} 
    @endforeach

@endsection
