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

    <div class="card">
        <h2>Exam creation</h2>

        <div class="card-input">

            <p style ="text-align:left;margin-left:40px;margin-bottom:5px"><b>Start date</b></p>

            <input type="date" name="start_date" id="start_date">

            <p style ="text-align:left;margin-left:40px;margin-bottom:5px"><b>End date</b></p>

            <input type="date" name="end_date" id="end_date">

            <p>
                <select id="time_limit" name="time_limit">
                    <option class="escolha" disabled selected value>Time Limit</option>
                    <option value="30">30m</option>
                    <option value="60">1h</option>
                    <option value="90">1h30m</option>
                    <option value="120">2h</option>
                </select>
            </p>

            @foreach ($questions as $question)
            <p style="text-align: left">
                <input type="checkbox" name="question[]" id="question[]" value="{{ $question->id }}">
                <label>{{ $question->id }} - {{ $question->title }}</label>
            </p>
            @endforeach

        </div>

        <p><button class="save" type="submit">Save</button></p>
    </div>

</form>

@endsection
