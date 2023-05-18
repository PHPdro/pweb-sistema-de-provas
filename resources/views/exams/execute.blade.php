@extends('layouts.main')

@section('title', $exam->id.' - '.$exam->title)

@section('content')

<form action="" method="POST">

    @csrf

    <div id="exam">

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

        <div id ="timer">
            Time left: <span id="time">{{ $exam->time_limit }}:00</span>
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
        var time_limit = 1 * 10,//{{ $exam->time_limit }} * 60,
            display = document.querySelector('#time');
        startTimer(time_limit, display);
        const timeout = setTimeout(endMessage, 11000);
    };

    function endMessage() {
        document.getElementById('end').style.display = 'block';
        document.getElementById('timer').style.display = 'none';
        document.getElementById('exam').style.display = 'none';
    }

</script>

@endsection