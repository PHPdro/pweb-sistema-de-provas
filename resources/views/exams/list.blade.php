@extends('layouts.main')

@section('title', 'Exams')

@section('content')

<h1>Exams</h1>

@foreach ($exams as $exam)
<a href="/exams/{{ $exam->id }}">
    <div class="card">
        {{ $exam->id }}
    </div>
</a>
@endforeach

<table>
    <tr>
        <td>
            <a class="button" style="height:20px;line-height:20px;width:70px" href="/exams/create">+ Create</a>
        </td>
    </tr>
</table>

@endsection