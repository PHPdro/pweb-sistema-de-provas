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
            </td>
            @if ($errors->has('email'))
            <tr>
                <td>
                    <small>{{ $errors->first('email') }}</small>
                </td>
            </tr>
            @endif
        </tr>
        <tr>
            <td>
                <input type="password" name="password" id="password" placeholder="Password...">
            </td>
            @if ($errors->has('password'))
            <tr>
                <td>
                    <small>{{ $errors->first('password') }}</small>
                </td>
            </tr>
            @endif
        </tr>
    </table>

    <p></p>

    <button type="submit">Login</button>

</form>

@endsection