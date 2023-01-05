@extends('layout')

@section('title')
    New post
@endsection

@section('content')
    <form method="POST" action='/new_post'>
        @csrf
        <input name='content' maxlength='255' type="text" placeholder="very interesting post...">
        
        <button type='submit'>Post</button>
    </form>
@endsection