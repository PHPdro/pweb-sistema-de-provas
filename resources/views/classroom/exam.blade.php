@extends('layouts.main')

@section('title', 'Class creation')

@section('content')

<div class="card">

    @foreach ($questions as $question)
        <div class="card-content">

            <p><a href="/questions/{{ $question->id }}">QUESTÃO {{ $question->id }}</a></p>
            <p>RESPOSTA:</p>

            @foreach ($answers as $answer)

                @if ($answer->question_id == $question->id)

                    @foreach ($question->options as $option)
                        @if ($option->id == $answer->option_id)
                            @if ($question->type == 4)
                                <p>{{ $option->option }} - {{ $answer->correct }}</p>
                            @else
                                <p>{{ $option->option }}</p>
                            @endif
                        @endif
                    @endforeach
                    <p>{{ $answer->text }}</p>
                @else
                    
                @endif            
            @endforeach
        </div>
    @endforeach

</div>

@endsection