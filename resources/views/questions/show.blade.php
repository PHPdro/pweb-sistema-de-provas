@extends('layouts.main')

@section('title', $question->id.' - '.$question->title)

@section('content')

<div class="card">
    <a class="button" href="/questions" style="width:20px"><</a>
    <h2>{{ $question->title }}</h2>
    <div class="card-content">
        <p>{{ $question->text }}</p>

        @if ($question->type == 2)
        
            @foreach($options as $option)
                <p>
                    @if ($option->correct == 1)
                    <input type="radio" name="correct[]" id="correct" value ="{{ $option->id }}" checked disabled>
                    @else
                    <input type="radio" name="correct[]" id="correct" value ="{{ $option->id }}" disabled>
                    @endif
                    <label>{{ $option->option }}</label>
                </p>
            @endforeach

        @elseif ($question->type == 3)

            @foreach($options as $option)
                <p>
                    @if ($option->correct == 1)
                    <input type="checkbox" name="correct[]" id="correct" value ="{{ $option->id }}" checked disabled>
                    @else
                    <input type="checkbox" name="correct[]" id="correct" value ="{{ $option->id }}" disabled>
                    @endif
                    <label>{{ $option->option }}</label>
                </p>
                    
            @endforeach

        @elseif ($question->type == 4)
            @foreach($options as $option)
                <p>
                    <label>{{ $option->option }}</label>
                    
                    @if ($option->correct == 1)
                    <label><b>V</b></label>
                    @else
                    <label><b>F</b></label>
                    @endif
                </p>
            @endforeach

        @endif

    </div>

    <p>
    <table class="show">
        <tr>
            <td>
                <a class="button" href="/questions/edit/{{ $question->id }}">Edit</a>
            </td>
            <td>
                <form action="/questions/delete/{{ $question->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    </table>
    <div style="text-align: right;">
        <label style="color: white">Created at {{ $question->created_at }} by {{ $users->name }}</label>
    </div>
</div>
@endsection