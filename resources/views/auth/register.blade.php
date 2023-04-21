@extends('layouts.main')

@section('title', 'Register')

@section('content')

<form action="{{ route('store') }}" method="POST">
    @csrf
    <table class="login">
        <tr><th><h1>Register</h1></th></tr>
        <tr>
            <td>
                <input type="text" name="name" id="name" placeholder="Name..." value="{{ old('name') }}">
            </td>
            @if ($errors->has('name'))
            <tr>
                <td>
                    <small>{{ $errors->first('name') }}</small>
                </td>
            </tr>
            @endif
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
        <tr><td><p></p></td></tr>
        <tr>
            <td>
                <select class="profile" name="profile" id="profile">
                    <option class="escolha" disabled selected value style>Select a profile</option>
                    <option value="1">Student</option>
                    <option value="2">Professor</option>
                </select>
            </td>
            @if ($errors->has('profile'))
            <tr>
                <td>
                    <small>{{ $errors->first('profile') }}</small>
                </td>
            </tr>
            @endif
        </tr>
        <tr><td><p></p></td></tr>
        <tr>
            <td>
                <button type="submit" style="width:80%">Register</button>
            </td>
        </tr>
        <tr><td><p></p></td></tr>
    </table>

</form>

@endsection