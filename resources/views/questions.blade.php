@extends('layouts.main')

@section('title', 'Questões')

@section('content')

<h1>QUESTÕES</h1>

@foreach ($questions as $question)

<p>{{ $question->id_questao }} - {{ $question->disciplina }} <a href="/edit/">EDITAR</a></p>
    
@endforeach

<a href="/create">CRIAR QUESTÃO</a>

@endsection