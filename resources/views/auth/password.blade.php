@extends('layouts.main')

@section('title', 'Login')

@section('content')


<form action="{{ route('first_access') }}" method="POST">

@csrf
@method('PUT')

<h1>New password</h1>

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

<button type="submit">Save</button>

</form>

@endsection