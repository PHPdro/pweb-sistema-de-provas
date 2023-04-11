@extends('layouts.main')

@section('title', 'Criar Questão')

@section('content')

<form method="POST" action="{{ url('/enviar') }}">

    @csrf

    <h3>CRIAR QUESTÃO</h3>

    <div id="dados_questao">
        <table>
            <tr>
                <td class="title">
                    <label>Disciplina:</label>
                </td>
                <td class="input">
                    <select id="disciplina" name="disciplina">
                        <option class="escolha" disabled selected value> -- Escolha uma opção --</option>
                        <option value="PWEB">Programação Web</option>
                        <option value="PROO">Programação Orientada a Objetos</option>
                        <option value="APSI">Análise e Projeto de Sistemas de Informação</option>
                        <option value="FNRE">Fundamentos de Redes de Computadores</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="title">
                    <label>Dificuldade:</label>
                </td>
                <td class="input">
                    <select id="nivel" name="nivel">
                        <option class="escolha" disabled selected value> -- Escolha uma opção --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="title">
                    <label>Tipo de questão:</label>
                </td>
                <td class="input">
                    <select id="tipo" name="tipo">
                        <option class="escolha" disabled selected value style> -- Escolha uma opção --</option>
                        <option value="1">Aberta</option>
                        <option value="2">Múltipla escolha (1 correta)</option>
                        <option value="3">Múltipla escolha (mais de 1 correta)</option>
                        <option value="4">V/F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="title">
                    <label>Enunciado:</label>
                </td>
                <td>
                    <textarea name="enunciado" id="enunciado" cols="40" rows="4" placeholder="Qual a fruta que fica com raiva e vai embora? AAAAAAAAAÇAÍ"></textarea>
                </td>
            </tr>
        </table>
    </div>


    <div id="questao-aberta" style="display:none;"> </div>

    <div id="questao-fechada-1" style="display:none;">
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
                    <a class="button" href="#" id="adicionar_fechada_1" onclick="adicionarAlternativa('tabela_fechada_1','radio','alternativa','respostafechada[]')">Adicionar</a>
                </td>
                <td>
                    <a class="button" href="#" id="remover_fechada_1" onclick="removerAlternativa('tabela_fechada_1')">Remover</a>
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
                    <a class="button" href="#" id="adicionar_fechada_2" onclick="adicionarAlternativa('tabela_fechada_2','checkbox','check[]','respostafechada2[]')">Adicionar</a>
                </td>
                <td>
                    <a class="button" href="#" id="remover_fechada_2" onclick="removerAlternativa('tabela_fechada_2')">Remover</a>
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
                    <a class="button" href="#" id="adicionar_vf" onclick="adicionarAlternativaVf()">Adicionar</a>
                </td>
                <td>
                    <a class="button" href="#" id="remover_vf" onclick="removerAlternativa('tabela_vf')">Remover</a>
                </td>
            </tr>
        </table>
    </div>

    <div id="salvar" style="display:none;"><p><button type="submit">Salvar</button></p></div>

</form>
    
<script src="/js/script.js"></script>
@endsection