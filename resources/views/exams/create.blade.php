@extends('layouts.main')

@section('title', 'Exam Creation')

@section('content')

<h1>Create Exam</h1>

<form action="{{ route('exams.store') }}" method="POST">

    @csrf

    <table class="exam">
        <tr>
            <td>
                <label>Start:</label>
            </td>
            <td>
                <input type="date">
            </td>
        </tr>
        <tr>
            <td>
                <label>End:</label>
            </td>
            <td>
                <input type="date">
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <select id="subject" name="subject" style="width:100%">
                    <option class="escolha" disabled selected value>Time Limit</option>
                    <option value="30">30m</option>
                    <option value="60">1h</option>
                    <option value="90">1h30m</option>
                    <option value="120">2h</option>
                </select>
            </td>
        </tr>
    </table>


</form>

@endsection
