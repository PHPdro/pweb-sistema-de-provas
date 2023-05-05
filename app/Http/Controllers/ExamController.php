<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class ExamController extends Controller
{
    public function index() {

        return view('exams.list');
    }

    public function create() {

        $questions = Question::all();

        return view('exams.create', ['questions' => $questions]);
    }

    public function store(Request $request) {

        
    }
}
