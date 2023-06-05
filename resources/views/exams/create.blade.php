@extends('layouts.main')

@section('title', 'Exam Creation')

@section('content')

<style>

    input[type="text"],[type="date"], select{

        background-color: #333;
        color: white;
        padding: 14px 14px;
        font-size: 15px;
        border-radius:5px;

    }
    
</style>

<form action="{{ route('exams.store') }}" method="POST">

    @csrf

    <div id="step-1">

        <div class="card">

            <img src="/img/exam-1.png" alt="step 1" width="50%">
    
            <h2 style="text-align: center">Information</h2>
    
            <div class="card-input">
                
                <p class="title"><b>Start date</b></p>
    
                <input type="date" name="start_date" id="start_date">
    
                <p class="title"><b>End date</b></p>
    
                <input type="date" name="end_date" id="end_date">
    
                <p class="title"><b>Title</b></p>
    
                <input type="text" name="title" id="title">
    
                <p class="title"><b>Description</b> (optional)</p>
    
                <input type="text" name="description" id="description">
    
                <p>
                    <select id="time_limit" name="time_limit">
                        <option class="escolha" disabled selected value>Time limit</option>
                        <option value="30">30m</option>
                        <option value="60">1h</option>
                        <option value="90">1h30m</option>
                        <option value="120">2h</option>
                    </select>
                </p>
    
            </div>
    
            <p><a class="button" href="#" style="margin-left:auto;" onclick="stepTwo()">Next</a></p>

        </div>

    </div>

    <div id="step-2" style="display: none;">

        <div class="card">

            <img src="/img/exam-2.png" alt="step 1" width="50%">
    
            <h2 style="text-align: center">Questions</h2>

            <div class="card-input">

                @foreach ($questions as $question)
                <div class="card-click" style="text-align: left">
                        <input type="checkbox" name="question[]" id="question[]" value="{{ $question->id }}">
                        <label style="color:white;">{{ $question->id }} - {{ $question->title }}</label>
                </div>
                @endforeach

            </div>

            <p style="float:none;clear:both">
                <a class="button" href="#" style="display:inline-block;margin-right:auto;" onclick="stepOne()">Back</a>
                <a class="button" href="#" style="display:inline-block;margin-right:auto;" onclick="stepThree()">Next</a>
            </p>

        </div>

    </div>

    <div id="step-3" style="display: none;">

        <div class="card">

            <img src="/img/exam-3.png" alt="step 3" width="50%">

            <h2 style="text-align: center">
                Classes
            </h2>

            <div class="card-click">

                @foreach ($classes as $class)

                    <p>
                        <input type="checkbox" name="classes[]" value="{{ $class->id }}">
                        <label>{{ $class->subject }} - {{ $class->semester }} - {{ $class->shift }}</label>
                    </p>
                    
                @endforeach

            </div>

            <p style="float:none;clear:both">
                <a class="button" href="#" style="display:inline-block;margin-right:auto;" onclick="stepTwo()">Back</a>
                <button class="save" type="submit" style="display:inline-block">Finish</button>
            </p>

        </div>
    </div>
</form>

@endsection
