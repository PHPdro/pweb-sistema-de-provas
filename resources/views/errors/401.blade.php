@extends('layouts.main')

@section('title', 'Error 401')

@section('content')

<div class="card">

    <h2>{{ $exception->getMessage() }}</h2>

    <div class="card-content">   

        <img src="/img/sad-capy.jpg" alt="Sad capybara" width="100%">

    </div>
    
</div>

@endsection