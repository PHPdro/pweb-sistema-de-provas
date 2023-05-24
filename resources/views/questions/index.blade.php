@extends('layouts.main')

@section('title', 'Questions')

@section('content')

<div class="card">

    <h2>Questions</h2>

    @foreach (Auth::user()->questions as $question)

    <div class="card-click">
        <a href="/questions/{{ $question->id }}">
            <div class="questions">
                {{ $question->title }}
            </div>
        </a>
    </div>

    @endforeach

    <p></p>

    @if (Auth::user()->admin == 1 || Auth::user()->professor == 1)
    <div>
        <a class="button" style="height:20px;line-height:20px;width:70px" href="/questions/create">+ Create</a>
    </div>
    @endif

</div>

@endsection