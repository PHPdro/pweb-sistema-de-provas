@extends('layouts.main')

@section('title', 'Classes')

@section('content')

<div class="card">

    <h2>
        Classes
    </h2>

    @if (count($classes) == 0)
    <div class="card-input">
        <p>No classes found.</p>
    </div>
    @else

        @foreach (Auth::user()->classrooms as $class)
            <div class="card-click">
                <a href="/classes/{{ $class->id }}">
                    <div class="classes">
                        {{ $class->subject }} - {{ $class->semester }} - {{ $class->shift }}
                    </div>
                </a>    
            </div>
        @endforeach

    @endif

    <p></p>
    @if (Auth::user()->admin == 1 || Auth::user()->professor == 1)
            <a class="button" style="height:20px;line-height:20px;width:70px" href="{{ route('classes.create') }}">+ Create</a>
    @endif

</div>


@endsection