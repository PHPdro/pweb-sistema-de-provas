<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Execution;
use App\Models\Answer;
use App\Models\Option;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ExecutionController extends Controller
{
    public function index($id) {

        $executions = Execution::all()->where('user_id', Auth::user()->id)->where('exam_id', $id);
        $exam = Exam::findOrFail($id);
        $current = Carbon::now();
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $current)->addMinutes($exam->time_limit);
        $questions = $exam->questions;

        if (count($executions) == 0) {

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

            foreach($executions as $execution) {

                if($execution->finished == 1) {
                    
                    abort(404);
                } else {
                    $end = $end = Carbon::createFromFormat('Y-m-d H:i:s', $execution->execution_end);
                }
            }

            $time_left = $end->diffInSeconds($current);
        }

        return view('exams.execute', ['exam' => $exam, 'questions' => $questions, 'time_left' => $time_left, 'current' => $current]);

    }

    public function store(Request $request, $id) {

        $executions = Execution::all()->where('user_id', Auth::user()->id)->where('exam_id', $id);

        $exam = Exam::findOrFail($id);

        $questions = $exam->questions;

        $answers = new Answer;

        foreach($executions as $execution) {

            $execution->update(['finished' => 1]);

            for($i = 0; $i < count($questions); $i++) {

                $answers = new Answer;
                $answers->execution_id = $execution->id;
                $answers->question_id = $questions[$i]->id;

                if($questions[$i]->type == 1) {

                    $answers->text = $request->answer[$questions[$i]->id];
                    $answers->save();

                } elseif ($questions[$i]->type == 2) {

                    $answers->option_id = $request->answer[$questions[$i]->id];
                    $answers->correct = Option::findOrFail($request->answer[$questions[$i]->id])->correct;
                    $answers->save();

                } elseif ($questions[$i]->type == 3) {

                    foreach($request->close as $option) {

                        $answers = new Answer;
                        $answers->execution_id = $execution->id;
                        $answers->question_id = $questions[$i]->id;
                        $answers->option_id = $option;
                        $answers->correct = Option::findOrFail($option)->correct;
                        $answers->save();

                    }  

                } else {

                    foreach($request->vf as $option) {
                        
                        $answers = new Answer;
                        $answers->execution_id = $execution->id;
                        $answers->question_id = $questions[$i]->id;
                        $answers->option_id = $option;
                        $answers->correct = Option::findOrFail($option)->correct;
                        $answers->save();
                    }
                }
            }
        }

        return redirect('/exams');
    }   
}
