@extends('layouts.main')

@section('title', 'Exams')

@section('content')

<div class="card">

    <h2>Exams</h2>

    @if (Auth::user()->student == 1 and Auth::user()->admin == 0)

        @foreach ($exams as $exam)

            <div class="card-click">
                <a href="/exams/{{ $exam->id }}">
                    <div class="exams">
                        {{ $exam->title }}
                    </div>
                </a>    
            </div>

        @endforeach
    
    @else

        @foreach (Auth::user()->exams as $exam)

            <div class="card-click">
                <a href="/exams/{{ $exam->id }}">
                    <div class="exams">
                        {{ $exam->title }}
                    </div>
                </a>    
            </div>

        @endforeach
    
    @endif



    <p></p>

    @if (Auth::user()->admin == 1 || Auth::user()->professor == 1)
    <div>
        <a class="button" style="height:20px;line-height:20px;width:70px" href="/exams/create">+ Create</a>
    </div>
    @endif


</div>

@endsection