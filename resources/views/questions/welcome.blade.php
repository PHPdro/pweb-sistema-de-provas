@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="card">

    <h2>Welcome!</h2>

    @auth
    <p>Logged as {{ Auth::user()->name }}.</p>
    @endauth

</div>

@endsection