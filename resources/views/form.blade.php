@extends('layout')

@push('styles')
    <link rel="stylesheet" @section('css')href="./form.css"@show/>
@endpush
@section('title', 'Form')
    
@section('content')
    @if(session('status'))
        <div>
            {{session('status')}}
        </div>
    @endif
    <form method="POST" action="/send">
            @csrf
            <label> Name: </label>
            <br>
            <input type="text" name="name" value="{{ old('name')}}">
            @error('name')
                <div class = "alert alert-danger"> {{$message}}</div>
            @enderror
            <br>
            <label> Phone: </label>
            <br>
            <input type="text" name="phone" value="{{old('phone')}}">
            @error('phone')
                <div class = "alert alert-danger"> {{$message}}</div>
            @enderror
            <br>
            <br>
            <br>
            <button> Submit </button>
    </form>
@endsection