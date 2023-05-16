@extends('layouts.main')

@section('title', $exam->id)

@section('content')

<div class="card">

    <h2>{{ $exam->title }}</h2>
        
        @for ($i = 0; $i < count($questions); $i++)

            <div class="card-content">

            <p>{{ $i+1 }}. {{ $questions[$i]->text }}</p>

            @foreach ($questions[$i]->options as $option)

                @if ($questions[$i]->type == 2)

                <p>
                    <input type="radio" name="correct[]" id="correct" value ="{{ $option->id }}">
                    <label>{{ $option->option }}</label>
                </p>

                @elseif ($questions[$i]->type == 3)

                <p>
                    <input type="checkbox" name="correct[]" id="correct" value ="{{ $option->id }}">
                    <label>{{ $option->option }}</label>
                </p>

                @elseif ($questions[$i]->type == 4)
                    
                @endif

                
            @endforeach


            </div>

            <p></p>
            
        @endfor

</div>



@endsection