@extends('layouts.main')

@section('title', 'Class creation')

@section('content')

<style>

    input[type="text"], select{

        background-color: #333;
        color: white;
        padding: 14px 14px;
        font-size: 15px;
        border-radius:5px;

    }

    label {
        color: white;
    }
    
</style>

<form action="{{ route('classes.store') }}" method="POST">
    @csrf

    <div id="step-1">

        <div class="card">
    
            <img src="/img/class-1.png" alt="step 1" width="40%">
    
            <h2 style="text-align:center">Information</h2>
    
            <div class="card-input">
    
                <select id="subject" name="subject">
                    <option class="escolha" disabled selected value>Subject</option>
                    <option value="PWEB">Programação Web</option>
                    <option value="PROO">Programação Orientada a Objetos</option>
                    <option value="APSI">Análise e Projeto de Sistemas de Informação</option>
                    <option value="FNRE">Fundamentos de Redes de Computadores</option>
                    <option value="SOPE">Sistemas Operacionais</option>
                    <option value="GOTI">Governança em Tecnologia da Informação</option>
                    <option value="GESI">Gerência da Segurança da Informação</option>
                </select>
    
                <select id="semester" name="semester">
                    <option class="escolha" disabled selected value>Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
    
                <select id="shift" name="shift">
                    <option class="escolha" disabled selected value>Shift</option>
                    <option value="MATUTINO">MATUTINO</option>
                    <option value="VESPERTINO">VESPERTINO</option>
                    <option value="NOTURNO">NOTURNO</option>
                </select>
    
            </div>
    
            <p><a class="button" href="#" style="margin-left:auto;" onclick="stepTwo()">Next</a></p>
        </div>
    </div>
    
    <div id="step-2" style="display: none;">
    
        <div class="card">
    
            <img src="/img/class-2.png" alt="step 1" width="40%">
    
            <h2 style="text-align: center">Students</h2>
    
            <div class="card-input">

                @foreach ($students as $student)
                <div class="card-click" style="text-align:left">
                    <input type="checkbox" name="students[]" value="{{ $student->id }}">
                    <label>{{ $student->name }} - {{ $student->id }}</label>
                </div>
                @endforeach
    
            </div>
    
            <p style="float:none;clear:both">
                <a class="button" href="#" style="display:inline-block;margin-right:auto;" onclick="stepOne()">Back</a>
                <button class="save" type="submit" style="display:inline-block">Finish</button>
            </p>
        </div>
    
    </div>

</form>

@endsection