<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class QuestionController extends Controller
{
    public function index() {

        $questions = Question::all();

        return view('questions', ['questions' => $questions]);
    }

    public function create() {

        return view('create');
    }
    
    public function store(Request $request) {

        $question = new Question;

        $id_questao = random_int(100000, 999999);
        $tipo = $request->tipo;

        $question->id_questao = $id_questao;
        $question->disciplina = $request->disciplina;
        $question->nivel = $request->nivel;
        $question->enunciado = $request->enunciado;

        if ($tipo == 1) {

            $tipo = "Aberta";
            $question->tipo = $tipo;
            $question->save();

            return redirect('/questions');
            
        } elseif ($tipo == 2) {
    
            $tipo = "Múltipla escolha (1 correta)";
            $question->tipo = $tipo;
            $question->save();

            $alternativas = $request->respostafechada;
            $correta = $request->alternativa;

            for ($i = 1; $i <= count($alternativas); $i++) {

                $option = new Option;

                $option->id_questao = $id_questao;
                $option->alternativa = $i;
                $option->enunciado_alternativa = $alternativas[$i-1];

                if($i == $correta) {
                    $option->valor = 1;
                } else {
                    $option->valor = 0;
                }

                $option->save();
            }

            return redirect('/questions');

        } elseif ($tipo == 3) {

            $tipo = "Múltipla escolha (mais de 1 correta)";
            $question->tipo = $tipo;
            $question->save();

            $alternativas = $request->respostafechada2;
            $corretas = $request->check;

            for ($i = 1; $i <= count($alternativas); $i++) {

                $option = new Option;

                $option->id_questao = $id_questao;
                $option->alternativa = $i;
                $option->enunciado_alternativa = $alternativas[$i-1];

                foreach($corretas as $correta) {
                    if($correta == $i) {
                        $option->valor = 1;
                        break;
                    } else {
                        $option->valor = 0;
                    }
                }

                $option->save();
             }

             return redirect('/questions');

        } else {

            $tipo = "V/F";
            $question->tipo = $tipo;
            $question->save();

            $alternativas = $request->respostavf;

            for ($i = 1; $i <= count($alternativas); $i++) {

                $option = new Option;

                $option->id_questao = $id_questao;
                $option->alternativa = $i;
                $option->enunciado_alternativa = $alternativas[$i-1];
                $option->valor = $request->vf[$i];
                $option->save();

            }
            return redirect('/questions');
        }
    }

    public function edit($id) {

        $question = Question::all();
        $option = Option::all();
        
        return view('edit', ['question' => $question, 'option' => $option]);
    }
}