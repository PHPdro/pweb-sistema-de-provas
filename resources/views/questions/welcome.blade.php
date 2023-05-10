@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="card">

    <h2>Welcome!</h2>

    @auth
    <p>Logged as {{ Auth::user()->name }}.</p>
    @endauth

    <div class="card-content">

        <img src="/img/capy.jpg" alt="Capybara" width="100%">

    </div>
    
</div>

@endsection