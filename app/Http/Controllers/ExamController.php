<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index() {

        return view('exams.list');
    }

    public function create() {

        return view('exams.create');
    }
}
