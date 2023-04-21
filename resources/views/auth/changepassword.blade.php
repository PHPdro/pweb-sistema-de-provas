@extends('layouts.main')

@section('title', 'Login')

@section('content')


<form action="/update/{{ Auth::user()->id }}" method="POST">

@csrf
@method('PUT')

<h1>New password</h1>

@if (Auth::user()->new_user == 1)

<p>Welcome, new user!</p>
<p>In order to access the system, you must create a new password.</p>
    
@endif

<table class="login">
    <tr>
        <td>
            <input type="password" name="password" id="password" placeholder="New password...">
        </td>
    </tr>
    @if ($errors->has('password'))
    <tr>
        <td>
            <small>{{ $errors->first('password') }}</small>
        </td>
    </tr>
    @endif
    <tr>
        <td>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password...">
        </td>
    </tr>   
</table>
<p></p>
<button type="submit">Save</button>

</form>

@endsection