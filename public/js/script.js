//INÍCIO 1

// Mostrar/esconder questão de acordo com o tipo selecionado

type.onchange = function(){

    var bts1 = document.getElementById("botoes_fechada_1");
    var bts2 = document.getElementById("botoes_fechada_2");
    var bts3 = document.getElementById("botoes_vf");

    var type = document.getElementById("type");
    var aberta = document.getElementById("questao-aberta");
    var fechada1 = document.getElementById("questao-fechada-1");
    var fechada2 = document.getElementById("questao-fechada-2");
    var vf = document.getElementById("questao_vf");

    var valor = type.options[type.selectedIndex].value;
    if (valor == 1) {

        fechada1.style.display = 'none';
        fechada2.style.display = 'none';
        vf.style.display = 'none'
        aberta.style.display = 'block';
        bts1.style.display = 'none';
        bts2.style.display = 'none';
        bts3.style.display = 'none';

    } else if (valor == 2) {

        fechada1.style.display = 'block';
        fechada2.style.display = 'none';
        vf.style.display = 'none'
        aberta.style.display = 'none';
        bts1.style.display = 'block';
        bts2.style.display = 'none';
        bts3.style.display = 'none';

    } else if ( valor == 3) {

        fechada1.style.display = 'none';
        fechada2.style.display = 'block';
        vf.style.display = 'none'
        aberta.style.display = 'none';
        bts1.style.display = 'none';
        bts2.style.display = 'block';
        bts3.style.display = 'none';

    } else {

        fechada1.style.display = 'none';
        fechada2.style.display = 'none';
        vf.style.display = 'block'
        aberta.style.display = 'none';
        bts1.style.display = 'none';
        bts2.style.display = 'none';
        bts3.style.display = 'block';
    }
}

// FIM 1

// INÍCIO 2

// Adicionar e remover alternativas para questões de múltipla escolha

function adicionarAlternativa(id, type, nome1, nome2) {

    var tabela = document.getElementById(id);

    var coluna = document.createElement('tr');
    var linha1 = document.createElement('td');
    var linha2 = document.createElement('td');

    tabela.appendChild(coluna);
    coluna.appendChild(linha1);
    coluna.appendChild(linha2);

    qtd = tabela.getElementsByTagName('tr').length;

    var alternativa = document.createElement('input');
    alternativa.setAttribute('type', type);
    alternativa.setAttribute('name', nome1);
    alternativa.setAttribute('value', qtd.toString());

    var resposta = document.createElement('input');
    resposta.setAttribute('type', 'text');
    resposta.setAttribute('placeholder', 'Texto...');
    resposta.setAttribute('name', nome2);


    linha1.appendChild(alternativa);
    linha2.appendChild(resposta);
}

function removerAlternativa(id) {

    var tabela = document.getElementById(id);

    var inputs = tabela.getElementsByTagName('tr');
    if(inputs.length > 1) {
        tabela.removeChild(inputs[(inputs.length) - 1]);
    }
}

// FIM 2

// INÍCIO 3

function adicionarAlternativaVf() {

    var tabela = document.getElementById('tabela_vf');

    var coluna = document.createElement('tr');
    var linha1 = document.createElement('td');
    var linha2 = document.createElement('td');
    var linha3 = document.createElement('td');

    tabela.appendChild(coluna);
    coluna.appendChild(linha1);
    coluna.appendChild(linha2);
    coluna.appendChild(linha3)

    var texto = document.createElement('input');
    texto.setAttribute('type', 'text');
    texto.setAttribute('placeholder', 'Texto...');
    texto.setAttribute('name', 'respostavf[]');

    qtd = tabela.getElementsByTagName('tr').length;

    var verdadeiro = document.createElement('input');
    verdadeiro.setAttribute('type', 'radio');
    verdadeiro.setAttribute('name', 'vf['+(qtd-1)+']');
    verdadeiro.setAttribute('value', '1');

    var falso = document.createElement('input');
    falso.setAttribute('type', 'radio');
    falso.setAttribute('name', 'vf['+(qtd-1)+']');
    falso.setAttribute('value', '0');

    linha1.appendChild(texto);
    linha2.appendChild(verdadeiro);
    linha3.appendChild(falso);

}

// FIM 3