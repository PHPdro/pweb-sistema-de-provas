@extends('layouts.main')

@section('title', 'Criar Questão')

@section('content')

<form method="POST" action="{{ url('/enviar') }}">

    @csrf

    <h3>QUESTÃO</h3>

    <p>Disciplina:
        <select id="disciplinas">
            <option class="escolha" disabled selected value> -- Escolha uma opção --</option>
            <option value="pweb">Programação Web</option>
            <option value="proo">Programação Orientada a Objetos</option>
            <option value="apsi">Análise e Projeto de Sistemas de Informação</option>
            <option value="fnre">Fundamentos de Redes de Computadores</option>
        </select>
    </p>

    <p>Dificuldade:
        <select id="dificuldade">
            <option class="escolha" disabled selected value> -- Escolha uma opção --</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </p>

    <p>Tipo de questão:
        <select name="tipos" id="tipos" onchange="escolherQuestao()">
            <option class="escolha" disabled selected value style> -- Escolha uma opção --</option>
            <option value="1">Aberta</option>
            <option value="2">Múltipla escolha (1 correta)</option>
            <option value="3">Múltipla escolha (mais de 1 correta)</option>
            <option value="4">V/F</option>
        </select>
    </p>

    <div id="questao-aberta" style="display:none;"> 
        <p>Enunciado: <input type="text"></p>
        <p><button type="submit">Salvar</button></p>
    </div>

    <div id="questao-fechada-1" style="display:none;">
        <p>Enunciado: <input type="text" name="enunciado"></p>
        <input type="radio" name="opcao" value ="1"> <input type="text" name="1" placeholder="Opção 1..."><br>
        <input type="radio" name="opcao" value ="2"> <input type="text" name="2" placeholder="Opção 2..."><br>
        <input type="radio" name="opcao" value ="3"> <input type="text" name="3" placeholder="Opção 3..."><br>
        <input type="radio" name="opcao" value ="4"> <input type="text" name="4" placeholder="Opção 4...">
        <p><button type="submit">Salvar</button></p>
    </div>

    <div id="questao-fechada-2" style="display:none;">
        <p>Enunciado: <input type="text" name="enunciado"></p>
        <input type="checkbox" value ="1"> <input type="text" placeholder="Opção 1..."><br>
        <input type="checkbox" value ="2"> <input type="text" placeholder="Opção 2..."><br>
        <input type="checkbox" value ="3"> <input type="text" placeholder="Opção 3..."><br>
        <input type="checkbox" value ="4"> <input type="text" placeholder="Opção 4...">
        <p><button type="submit">Salvar</button></p>
    </div>

    <div id="questao-vf" style="display:none;">
        <p>Enunciado: <input type="text" name="enunciado"></p>
        <table>
            <tr>
                <th></th>
                <th>V</th>
                <th>F</th>
            </tr>
            <tr>
                <td><input type="text" placeholder="Opção 1..."></td>
                <td><input type="radio" name="q1" value="1"></td>
                <td><input type="radio" name="q1" value="0"></td>
            </tr>
            <tr>
                <td><input type="text" placeholder="Opção 2..."></td>
                <td><input type="radio" name="q2" value="1"></td>
                <td><input type="radio" name="q2" value="0"></td>
            </tr>
            <tr>
                <td><input type="text" placeholder="Opção 3..."></td>
                <td><input type="radio" name="q3" value="1"></td>
                <td><input type="radio" name="q3" value="0"></td>
            </tr>
            <tr>
                <td><input type="text" placeholder="Opção 4..."></td>
                <td><input type="radio" name="q4" value="1"></td>
                <td><input type="radio" name="q4" value="0"></td>
            </tr>
        </table>
        <p><button type="submit">Salvar</button></p>
    </div>

</form>
    
<script>

function escolherQuestao() {

    var select = document.getElementById("tipos");
    var valor = select.options[select.selectedIndex].value;
    if (valor == 1) {

        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'none';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'none';
        var vf = document.getElementById("questao-vf");
        vf.style.display = 'none'
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'block';

    } else if (valor == 2) {

        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'block';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'none';
        var vf = document.getElementById("questao-vf");
        vf.style.display = 'none'
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'none';

    } else if ( valor == 3) {

        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'none';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'block';
        var vf = document.getElementById("questao-vf");
        vf.style.display = 'none'
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'none';

    } else {

        var fechada1 = document.getElementById("questao-fechada-1");
        fechada1.style.display = 'none';
        var fechada2 = document.getElementById("questao-fechada-2");
        fechada2.style.display = 'none';
        var vf = document.getElementById("questao-vf");
        vf.style.display = 'block'
        var aberta = document.getElementById("questao-aberta");
        aberta.style.display = 'none';
    }
}

</script>

@endsection