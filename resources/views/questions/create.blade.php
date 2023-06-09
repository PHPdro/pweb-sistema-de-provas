@extends('layouts.main')

@section('title', 'Criar Questão')

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

<form method="POST" action="{{ url('/questions/store') }}">

    @csrf

    <div class="card">
        <a class="button" href="/questions" style="width:20px"><</a>

        <h2>Question creation</h2>

        <div class="card-input">

            <p class="title">
                <b>Title</b>
            </p>

            <input type="text" id="title" name="title">

            <p class="title">
                <b>Text</b>
            </p>

            <input type="text" id="text" name="text">

            <p></p>

            <select id="subject" name="subject">
                <option class="escolha" disabled selected value>Subject</option>
                <option value="PWEB">Programação Web</option>
                <option value="PROO">Programação Orientada a Objetos</option>
                <option value="APSI">Análise e Projeto de Sistemas de Informação</option>
                <option value="FNRE">Fundamentos de Redes de Computadores</option>
            </select>

            <br>

            <select id="nivel" name="nivel">
                <option class="escolha" disabled selected value>Difficulty</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <br>

            <select id="type" name="type">
                <option class="escolha" disabled selected value style>Format</option>
                <option value="1">Aberta</option>
                <option value="2">Múltipla escolha (1 correta)</option>
                <option value="3">Múltipla escolha (mais de 1 correta)</option>
                <option value="4">V/F</option>
            </select>

            <div id="questao-aberta" style="display:none;"> </div>

            <div id="questao-fechada-1" style="display:none;text-align:center">
                <table id="tabela_fechada_1">
                    <tr>
                        <td>
                            <input type="radio" name="alternativa" value="1">
                        </td>
                        <td>
                            <input type="text" name="respostafechada[]" placeholder="Texto...">
                        </td>
                    </tr>
                </table>
            </div>

            <div id="botoes_fechada_1" style="display:none;">
                <table>
                    <tr>
                        <td>
                            <a class="button" href="#" id="adicionar_fechada_1" onclick="adicionarAlternativa('tabela_fechada_1','radio','alternativa','respostafechada[]')">Add</a>
                        </td>
                        <td>
                            <a class="button" href="#" id="remover_fechada_1" onclick="removerAlternativa('tabela_fechada_1')">Remove</a>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="questao-fechada-2" style="display:none;">
                <table id="tabela_fechada_2">
                    <tr>
                        <td>
                            <input type="checkbox" name = "check[]" value ="1">
                        </td>
                        <td>
                            <input type="text" name="respostafechada2[]" placeholder="Texto...">
                        </td>
                    </tr>
                </table>
            </div>

            <div id="botoes_fechada_2" style="display:none;">
                <table>
                    <tr>
                        <td>
                            <a class="button" href="#" id="adicionar_fechada_2" onclick="adicionarAlternativa('tabela_fechada_2','checkbox','check[]','respostafechada2[]')">Add</a>
                        </td>
                        <td>
                            <a class="button" href="#" id="remover_fechada_2" onclick="removerAlternativa('tabela_fechada_2')">Remove</a>
                        </td>
                    </tr>
                </table>
            </div>

        <div id="questao_vf" style="display:none;">
            <table id="tabela_vf">
                <tr>
                    <th></th>
                    <th>V</th>
                    <th>F</th>
                </tr>
                <tr>
                    <td><input type="text" name="respostavf[]" placeholder="Texto..."></td>
                    <td><input type="radio" name="vf[1]" value="1"></td>
                    <td><input type="radio" name="vf[1]" value="0"></td>
                </tr>
            </table>
        </div>

        <div id="botoes_vf" style="display:none;">
            <table>
                <tr>
                    <td>
                        <a class="button" href="#" id="adicionar_vf" onclick="adicionarAlternativaVf()">Add</a>
                    </td>
                    <td>
                        <a class="button" href="#" id="remover_vf" onclick="removerAlternativa('tabela_vf')">Remove</a>
                    </td>
                </tr>
            </table>
        </div>

        </div>

            <p>
                
            <div>
                <button class="save" type="submit">Save</button>
            </div>
    </div>
</form>
    
@endsection