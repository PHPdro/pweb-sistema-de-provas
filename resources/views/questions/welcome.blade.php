@extends('layouts.main')

@section('title', 'Home')

@section('content')

@auth
<p>Logado como {{ Auth::user()->name }}</p>
@endauth

@endsection