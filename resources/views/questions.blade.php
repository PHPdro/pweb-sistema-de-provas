@extends('layouts.main')

@section('title', 'Questões')

@section('header', 'Questions')

@section('content')

@foreach ($questions as $question)

<p> {{ $question->id }} - {{ $question->title }} <a href="/questions/edit/{{ $question->id }}">EDITAR</a> <a href="/questions/delete/{{ $question->id }}">DELETAR</a></p>
    
@endforeach

<a href="/questions/create">CRIAR QUESTÃO</a>

@endsection