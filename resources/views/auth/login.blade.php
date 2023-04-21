@extends('layouts.main')

@section('title', 'Login')

@section('content')

<form action="{{ route('authenticate') }}" method="POST">
    @csrf
    <table class="login">
        <tr>
            <th><h1>Login</h1></th>
        </tr>
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

        <tr><td><p></p></td></tr>

        <tr>
            <td><button type="submit" style="width:80%">Login</button></td>
        </tr>

        <tr><td><p></p></td></tr>

        <tr>
            <td>
                <a href="/adsfa" style="color:grey;text-decoration:none;">Forgot password?</a>
            </td>
        </tr>

        <tr><td><p></p></td></tr>
    </table>

</form>

@endsection