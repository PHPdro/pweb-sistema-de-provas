@extends('layouts.main')

@section('title', $student->name)

@section('content')

<div class="card">
    <h2>{{ $student->name }}'s exams</h2>

    @foreach ($exams as $exam)
    <div class="card-click">
            <p><a href="/student/{{ $student->id }}/exam/{{ $exam->id }}">{{ $exam->title }}</a></p>
    </div>
    @endforeach
</div>

@endsection
