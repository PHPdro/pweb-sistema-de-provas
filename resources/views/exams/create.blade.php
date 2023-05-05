@extends('layouts.main')

@section('title', 'Exam Creation')

@section('content')

<h1>Create Exam</h1>

<form action="{{ route('exams.store') }}" method="POST">

    @csrf

    <table>
        <tr>
            <td>
                <label>Start:</label>
            </td>
            <td>
                <input type="date" name="start_date">
            </td>
        </tr>
        <tr>
            <td>
                <label>End:</label>
            </td>
            <td>
                <input type="date" name="end_date">
            </td>
        </tr>
    </table>
    <table class="exam">
        <tr>
            <td>
                <select id="time_limit" name="time_limit" style="width:40%">
                    <option class="escolha" disabled selected value>Time Limit</option>
                    <option value="30">30m</option>
                    <option value="60">1h</option>
                    <option value="90">1h30m</option>
                    <option value="120">2h</option>
                </select>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <th>
                Selecione as questões para a prova:
            </th>
        </tr>
        @foreach ($questions as $question)
            <tr>
                <td>
                    <input type="checkbox" name="question" id="question" value="{{ $question->id }}">
                    <label>#{{ $question->id }} - {{ $question->title }}</label>
                </td>
            </tr>
        @endforeach
        <tr><td><p></p></td></tr>
        <tr>
            <td>
                <button type="submit" style="width: 80%">Finish</button>
            </td>
        </tr>
    </table>
</form>

@endsection
