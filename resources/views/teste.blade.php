@extends('layouts.main')

@section('title', 'Teste')

@section('content')

<h1>teste</h1>

{{ $tipo }}

{{ $correta }}

@foreach ($respostas as $resposta)

<p>{{ $resposta }}</p>
    
@endforeach

@endsection