@extends('layouts.main')

@section('title', $class->subject.' '.$class->shift)

@section('content')

<div class="card">
    <h2>
        Participants
    </h2>

    <div class="card-content">

        @foreach ($students as $student)
            @if ($student->professor == 1)
                <p>{{ $student->name }} - Professor</p>
            @else
                <p>{{ $student->name }}</p>
            @endif
        @endforeach

    </div>
</div>

@endsection