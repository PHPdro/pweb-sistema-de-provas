@extends('layouts.main')

@section('title', 'Register')

@section('content')

<style>
    p {
        color: black;
    }
</style>

<p>Usuário cadastrado com sucesso!</p>

<p>Senha provisória: <b>{{ $password }}</b></p>

@endsection
