@extends('layouts.main')

@section('title', 'Register')

@section('content')

<style>

    input[type="text"], select{

        background-color: white;
        color: black;
        border: 1px solid grey;
        border-radius: 5px;
        padding: 15px 15px;
        font-size: 15px;
    }

    div.card {
        width:35%;
    }

    p {
        color: black;
    }

</style>

<form action="{{ route('auth.store') }}" method="POST">
    @csrf

    <div class="card" style="background-color: white;">

        <h2 style="color: black">Register</h2>

            <p><input type="text" name="name" id="name" placeholder="Name..." value="{{ old('name') }}"></p>

            <p>
                @if ($errors->has('name'))
                <small>{{ $errors->first('name') }}</small>
                @endif
            </p>
    

            <p><input type="text" name="email" id="email" placeholder="E-mail..." value="{{ old('email') }}"></p>

            <p>
                @if ($errors->has('email'))
                <small>{{ $errors->first('email') }}</small>
                @endif
            </p>

            <select name="profile" id="profile">
                <option class="escolha" disabled selected value style>Select a profile</option>
                <option value="1">Student</option>
                <option value="2">Professor</option>
            </select>

            <p>
                @if ($errors->has('profile'))
                <small>{{ $errors->first('profile') }}</small>
                @endif
            </p>
        

            <p><button class="save" type="submit" style="width:70%;margin:auto;font-size:18px">Register user</button></p>

    </div>

</form>

@endsection