@extends('layouts.main')

@section('title', 'Login')

@section('content')

<h1>Login</h1>
<form action="{{ route('authenticate') }}" method="POST">
    @csrf
    <table class="login">
        <tr>
            <td>
                <input type="text" name="email" id="email" placeholder="E-mail..." value="{{ old('email') }}">
                @if ($errors->has('email'))
                <small>{{ $errors->first('email') }}</small>
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <input type="password" name="password" id="password" placeholder="Password...">
                @if ($errors->has('password'))
                <small>{{ $errors->first('password') }}</small>
                @endif
            </td>
        </tr>
    </table>

    <p></p>

    <button type="submit">Login</button>

</form>

@endsection