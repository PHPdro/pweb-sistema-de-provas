<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\User;
use App\Models\Execution;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    public function index() {

        $classes = Auth::user()->classrooms;

        return view('classroom.index', ['classes' => $classes]);
    }

    public function create() {

        $students = User::all()->where('student', 1)->where('admin', 0);

        return view('classroom.create', ['students' => $students]);
    }

    public function store(Request $request) {
        
        $class = new Classroom;
        $class->subject = $request->subject;
        $class->semester = $request->semester;
        $class->shift = $request->shift;
        $class->save();

        $class->users()->attach(Auth::user()->id);

        $students = $request->students;

        for ($i = 0; $i < count($students); $i++) {

            $user = User::findOrFail($students[$i]);
            $class->users()->attach($user->id);
        }

        return redirect('/classes');

    }

    public function show($id) {

        $class = Classroom::findOrFail($id);
        $students = $class->users;

        return view('classroom.show', ['class' => $class, 'students' => $students]);
    }

    public function student_exams($student_id, $class_id) {

        $student = User::find($student_id);

        $classes = $student->classrooms;

        $exams = Exam::all()->where('classroom_id', $class_id);

        return view('classroom.student_exams', ['student' => $student,'classes' => $classes, 'exams' => $exams]);
    }

    public function exam($student_id, $exam_id) {

        $answers = Execution::all()->where('user_id', $student_id)->where('exam_id', $exam_id);

        foreach($answers as $answer) {

            $meucu = $answer->answers;
        }

        $questions = Exam::find($exam_id)->questions;

        return view('classroom.exam', ['questions' => $questions, 'answers' => $meucu]);
    }

}
