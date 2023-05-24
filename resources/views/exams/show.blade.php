@extends('layouts.main')

@section('title', $exam->id)

@section('content')


<div class="card">
    <a class="button" href="/exams" style="width:20px"><</a>
    <h2>{{ $exam->title }}</h2>
    <div class="card-input" style="text-align: left">
        <p><b>Start date:</b> {{ date('d/m/Y', strtotime($exam->start_date)) }}</p>
        <p><b>End date:</b> {{ date('d/m/Y', strtotime($exam->end_date)) }}</p>
        <p><b>Execution time:</b> {{ $exam->time_limit }} min.</p>
        @if (!(is_null($exam->description)))
            <p><b>Desctiption:</b> {{ $exam->description }}</p>
        @endif
        <p><b>Number of questions: </b> {{ count($exam->questions) }}</p>
    </div>

    @if (Auth::user()->student == 1 && Auth::user()->admin == 0)
        <p>
            <a class="button" style ="width:40%;margin:auto;" href="/exams/execute/{{ $exam->id }}">Start execution</a>
        </p>
    @else
        <p>
            <form action="/exams/delete/{{ $exam->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="delete" type="submit">Delete</button>
            </form>
        </p>
    @endif

</div>

@endsection