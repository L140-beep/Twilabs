@extends('layout')

@section('title')
    @if(isset($username))
        {{$username}}
    @endif
@endsection

@section('posts')
    @if(isset($username))
        {{$username}}
    @endif

    @if(count($posts) == 0)
        This user has not written posts yet...
    @endif

    @for($i = count($posts) - 1; $i != -1; $i--)
        <br>
        {{$username}}
        <label>{{$posts[$i]->created_at}}</label>
        <br>
            {{$posts[$i]->content}}
        <br>
    @endfor
@endsection