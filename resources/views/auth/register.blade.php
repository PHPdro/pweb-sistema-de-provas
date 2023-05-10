@extends('layouts.main')

@section('title', 'Register')

@section('content')

<style>

    input[type="text"], select{

        background-color: white;
        color: black;
        border: 1px solid grey;
        padding: 15px 15px;
        font-size: 15px;
    }

    div.card {
        width:35%;
    }

</style>

<form action="{{ route('auth.store') }}" method="POST">
    @csrf

    <div class="card" style="background-color: white;">

        <h2 style="color: black">Register</h2>

            <input type="text" name="name" id="name" placeholder="Name..." value="{{ old('name') }}">
            @if ($errors->has('name'))
                <small>{{ $errors->first('name') }}</small>
            @endif

            <p>

            <input type="text" name="email" id="email" placeholder="E-mail..." value="{{ old('email') }}">
            @if ($errors->has('email'))
                <small>{{ $errors->first('email') }}</small>
            @endif

            <p>

            <select name="profile" id="profile">
                <option class="escolha" disabled selected value style>Select a profile</option>
                <option value="1">Student</option>
                <option value="2">Professor</option>
            </select>
            @if ($errors->has('profile'))
                <small>{{ $errors->first('profile') }}</small>
            @endif
        
        <p>

        <button class="save" type="submit" style="width:70%;margin:auto;font-size:18px">Register user</button>

    </div>

</form>

@endsection