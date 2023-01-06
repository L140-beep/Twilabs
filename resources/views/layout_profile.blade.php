@extends('layout')

@section('title')
    @if(isset($username))
        {{$username}}
    @endif
@endsection

@section('posts')
    <label class='nickname' style='font-size: 26px; margin-top: 20px; margin-bottom: 10px;'>
        @if(isset($username))
            {{$username}}
        @endif
    </label>
    @if(count($posts) == 0)
        This user has not written posts yet...
    @endif

    @for($i = count($posts) - 1; $i != -1; $i--)
        <div class='post'>
            <label class='nickname'>{{$username}}</label>
            <label class='created_at'>{{$posts[$i]->created_at}}</label>
            <br>
                {{$posts[$i]->content}}
        </div>
    @endfor
@endsection