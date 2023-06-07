@extends('layouts.main')

@section('title', $exam->id.' - '.$exam->title)

@section('content')

<form action="{{ route('execution.store') }}" method="POST">

    @csrf

    <div id="exam">

        <div id ="timer">
            Time left: <span id="time">{{ intdiv($time_left, 60) }}:{{ ((($time_left / 60) - intdiv($time_left, 60)) * 60) + 1 }}</span>
        </div>

        <div class="card">

            <h2>{{ $exam->title }}</h2>
                
            @for ($i = 0; $i < count($questions); $i++)
    
                <div class="card-content">
    
                <p>{{ $i+1 }}. {{ $questions[$i]->text }}</p>

                @if ($questions[$i]->type == 1)
                    <p>
                        <input type="text" name="answer" id="answer">
                    </p>
                @else
    
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
                    
                @endif
    
                </div>
                
            @endfor
    
                <p><button class="save" type="submit" style="width:30%;margin:auto;">Finish</button></p>
        
        </div>

    </div>

        <div id="end" style="display:none;">
            <div class="card">
                <h2 style=>Time's over!</h2>
                <p>Click to finish the test.</p>
                <p><button class="save" type="submit" style="width:30%;margin:auto;">Finish</button></p>
            </div>
        </div>

</form>

<script>

    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
    }

    window.onload = function () {
        var time_limit = {{ $time_left }},
            display = document.querySelector('#time');
        startTimer(time_limit, display);
        const timeout = setTimeout(endMessage, {{ $time_left * 1000 }});
    };

    function endMessage() {
        document.getElementById('end').style.display = 'block';
        document.getElementById('timer').style.display = 'none';
        document.getElementById('exam').style.display = 'none';
    }

</script>

@endsection