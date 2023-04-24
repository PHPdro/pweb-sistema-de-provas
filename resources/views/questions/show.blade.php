@extends('layouts.main')

@section('title', $question->title)

@section('content')

<h2>#{{ $question->id }} {{ $question->title }}</h2>

<p style="text-align: left">{{ $question->text }}</p>

<table class ="show">
    @if ($question->type == 2)

        @foreach($options as $option)
            <tr>
                <td>
                    @if ($option->correct == 1)
                    <input type="radio" name="correct[]" id="correct" value ="{{ $option->id }}" checked>
                    @else
                    <input type="radio" name="correct[]" id="correct" value ="{{ $option->id }}">
                    @endif
                </td>
                <td>
                    <p>{{ $option->option }}</p>
                </td>
            </tr>
        @endforeach

    @elseif ($question->type == 3)

        @foreach($options as $option)
            <tr>
                <td>
                    @if ($option->correct == 1)
                    <input type="checkbox" name="correct[]" id="correct" value ="{{ $option->id }}" checked>
                    @else
                    <input type="checkbox" name="correct[]" id="correct" value ="{{ $option->id }}">
                    @endif
                </td>
                <td>
                    <p>{{ $option->option }}</p>
                </td>
            </tr>
        @endforeach

    @elseif ($question->type == 4)
        <tr>
            <th></th>
            <th>V</th>
            <th>F</th>
        </tr>
        @foreach($options as $option)
            <tr style="text-align:left">
                <td style="width:94%">
                    <p>{{ $option->option }}</p>
                </td>
                <td style="width:3%">
                    @if ($option->correct == 1)
                        <input type="radio" name="correct[{{ $option->id }}]" id="correct" value ="1" checked>
                    @else
                        <input type="radio" name="correct[{{ $option->id }}]" id="correct" value="1">
                    @endif
                </td>
                <td style="width:3%">
                    @if ($option->correct == 0)
                        <input type="radio" name="correct[{{ $option->id }}]" id="correct" value ="0" checked>
                    @else
                        <input type="radio" name="correct[{{ $option->id }}]" id="correct" value="0">
                    @endif
                </td>
            </tr>
        @endforeach

    @endif
    <tr>
        <td style="text-align:left">
            <label>Created at {{ $question->created_at }} by {{ $users->name }}</label>
        </td>
    </tr>
</table>

@endsection