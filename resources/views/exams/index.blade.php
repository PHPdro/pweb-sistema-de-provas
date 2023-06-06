@extends('layouts.main')

@section('title', 'Exams')

@section('content')

<div class="card">

    <h2>Exams</h2>

    @if (count($exams) == 0)
        <div class="card-input">
            <p>No exams found.</p>
        </div>
    @else

        @if (Auth::user()->student == 1 and Auth::user()->admin == 0)

            @foreach (Auth::user()->classrooms as $class)

                @foreach ($class->exams as $exam)

                    <div class="card-click">
                        <a href="/exams/{{ $exam->id }}">
                            <div class="exams">
                                {{ $exam->title }} - {{ $exam->classroom->subject }} {{ $exam->classroom->semester }} {{ $exam->classroom->shift }}
                            </div>
                        </a>    
                    </div>
                    
                @endforeach

            @endforeach
        
        @else

            @foreach (Auth::user()->exams as $exam)

                <div class="card-click">
                    <a href="/exams/{{ $exam->id }}">
                        <div class="exams">
                            {{ $exam->title }} - {{ $exam->classroom->subject }} {{ $exam->classroom->semester }} {{ $exam->classroom->shift }}
                        </div>
                    </a>    
                </div>

            @endforeach
        
        @endif

    @endif

    <p></p>

    @if (Auth::user()->admin == 1 || Auth::user()->professor == 1)
    <div>
        <a class="button" style="height:20px;line-height:20px;width:70px" href="{{ route('exams.create') }}">+ Create</a>
    </div>
    @endif


</div>

@endsection