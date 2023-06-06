<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\User;
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
}
