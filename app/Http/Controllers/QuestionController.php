<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index() {
        return view('create');
    }

    public function create() {

        $questions = Question::all();

        if (!empty($_POST['tipos'])) {
            $tipo = $_POST['tipos'];
        }

         if ($tipo == 2) {
            if (!empty($_POST['opcao'])) {
                $correta = $_POST['opcao'];
            }
            $resposta1 = request()->input('1');
            $resposta2 = request()->input('2');
            $resposta3 = request()->input('3');
            $resposta4 = request()->input('4');
            
        }
        $respostas = array($resposta1, $resposta2, $resposta3, $resposta4);

        return view('teste', compact('tipo','correta','respostas'));
    }
}