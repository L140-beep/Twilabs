@extends('layout')

@section('title')
    @if(isset($username))
        {{$username}}
    @endif
@endsection

@section('content')
    @if(isset($id))
        {{$id}}
    @endif
@endsection