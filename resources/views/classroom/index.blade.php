@extends('layouts.main')

@section('title', 'Classes')

@section('content')

<div class="card">

    <h2>
        Classes
    </h2>

    @foreach ($classes as $class)

        <div class="card-click">
            <a href="/classes/{{ $class->id }}">
                {{ $class->subject }} - {{ $class->semester }} - {{ $class->shift }}
            </a>
        </div>
        
    @endforeach

    @if (Auth::user()->admin == 1 || Auth::user()->professor == 1)

    <div>
        <a class="button" style="height:20px;line-height:20px;width:70px" href="{{ route('classes.create') }}">+ Create</a>
    </div>
    @endif

</div>


@endsection