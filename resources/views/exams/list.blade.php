@extends('layouts.main')

@section('title', 'Exams')

@section('content')

<div class="card">

    <h2>Exams</h2>

    @foreach (Auth::user()->exams as $exam)

    <div class="card-click">
        <a href="/exams/{{ $exam->id }}">
            <div class="exams">
                {{ $exam->id }}
            </div>
        </a>
    </div>

    @endforeach

    <p></p>

    @if (Auth::user()->admin == 1 || Auth::user()->professor == 1)
    <div>
        <a class="button" style="height:20px;line-height:20px;width:70px" href="/exams/create">+ Create</a>
    </div>
    @endif


</div>

@endsection