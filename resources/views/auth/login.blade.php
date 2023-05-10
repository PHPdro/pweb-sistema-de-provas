@extends('layouts.main')

@section('title', 'Login')

@section('content')

<style>

    input[type="text"],[type="password"]{

        background-color: white;
        color: black;
        border: 1px solid grey;
        padding: 14px 14px;
        font-size: 15px;
        border-radius:5px;
    }

    div.card {
        width:35%;
    }

    p {
        color: black;
    }

</style>

<form action="{{ route('authenticate') }}" method="POST">
    @csrf

    <div class="card" style="background-color: white;">

        <h2 style="color: black">Login</h2>

        <p style ="text-align:left;margin-left:40px;margin-bottom:5px"><b>Email</b></p>

        <input type="text" name="email" id="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
        <small>{{ $errors->first('email') }}</small>
        @endif

        <p style ="text-align:left;margin-left:40px;margin-bottom:5px"><b>Password</b></p>

        <input type="password" name="password" id="password">
        @if ($errors->has('password'))
            <small>{{ $errors->first('password') }}</small>
        @endif

        <p style="text-align: right;margin-top:5px;margin-right:40px;"><a href="/forgotpassword" style="color:grey;text-decoration:none;">Forgot password?</a></p>

        <p></p>

        <p><button class="save" type="submit" style="width:70%;margin:auto;font-size:18px">Login</button></p>

    </div>

</form>

@endsection