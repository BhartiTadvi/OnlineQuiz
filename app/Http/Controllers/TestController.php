<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Test;
use App\TestAnswer;
use App\QuestionAnswer;
use Auth;

class TestController extends Controller
{
    public function create(){
    	
    	$questions = Question::with('answers')->get();
    	return view('test.create',compact('questions'));
    }

    public function store(Request $request){
    	$result = 0;

        $test = Test::create([
            'user_id' => Auth::id(),
            'result'  => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.'.$question) != null) {
                $status = 1;
                $result++;
            }
            TestAnswer::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'answer_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);
        }

        $test->update(['result' => $result]);
        return view('results.show');
		//return redirect()->route('results-show', [$test->id]);
    }

    public function show(){
    	return view('results.show');
    }
}
