<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Execution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ExecutionController extends Controller
{
    public function index($id) {

        $execution = Execution::all()->where('user_id', Auth::user()->id)->where('exam_id', $id);
        $exam = Exam::findOrFail($id);
        $current = Carbon::now();
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $current)->addMinutes($exam->time_limit);
        $questions = $exam->questions;

        if (count($execution) == 0) {

            Execution::create([
                'user_id' => Auth::user()->id,
                'exam_id' => $id,
                'execution_start' => $current,
                'execution_end' => $end,
                'finished' => 0
            ]);

            Log::info(Auth::user()->name.' started the exam '.$exam->id);

            $time_left = $end->diffInSeconds($current);


        } else {

            foreach($execution as $exec) {

                $end = $end = Carbon::createFromFormat('Y-m-d H:i:s', $exec->execution_end);
            }

            $time_left = $end->diffInSeconds($current);

        }

        return view('exams.execute', ['exam' => $exam, 'questions' => $questions, 'time_left' => $time_left]);

    }

    public function store(Request $request) {
        
    }   
}
