<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index() {

        $exams = Exam::all();

        return view('exams.list', ['exams' => $exams]);
    }

    public function create() {

        $questions = Question::all();

        return view('exams.create', ['questions' => $questions]);
    }

    public function store(Request $request) {

        $exam = new Exam;

        $exam->user_id = Auth::user()->id;
        $exam->start_date = $request->start_date;
        $exam->end_date = $request->end_date;
        $exam->time_limit = $request->time_limit;
        $exam->save();

        $questions = $request->question;

        for ($i = 0; $i < count($questions); $i++) {

            $question = Question::findOrFail($questions[$i]);
            $exam->question()->attach($question->id);
        }

        return redirect()->back();
    }

    public function show(Request $request) {
        
    }
}
