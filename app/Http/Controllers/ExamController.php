<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExamController extends Controller
{
    public function index() {

        $exams = Exam::all();

        return view('exams.index', ['exams' => $exams]);
    }

    public function create() {

        $questions = Auth::user()->questions;
        $classes = Auth::user()->classrooms;

        return view('exams.create', ['questions' => $questions, 'classes' => $classes]);
    }

    public function store(Request $request) {

        $exam = new Exam;

        $exam->user_id = Auth::user()->id;
        $exam->start_date = $request->start_date;
        $exam->end_date = $request->end_date;
        $exam->title = $request->title;
        $exam->description = $request->description;
        $exam->time_limit = $request->time_limit;
        $exam->classroom_id = $request->classes;
        $exam->save();

        $questions = $request->question;

        for ($i = 0; $i < count($questions); $i++) {

            $question = Question::findOrFail($questions[$i]);
            $exam->questions()->attach($question->id);
        }

        return redirect('/exams');
    }

    public function show($id) {
        
        $classes = Auth::user()->classrooms;

        foreach($classes as $class) {

            foreach($class->exams as $exam) {

                if($exam->id == $id) {

                    return view('exams.show', ['exam' => $exam]);
                }
            }
        }
        abort(404);
    }

    public function destroy($id) {

        $exam = Exam::findOrFail($id);

        $exam->delete();

        return redirect('/exams');
        
    }
}
