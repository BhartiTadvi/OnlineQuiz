<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use App\TestAnswer;
use App\Question;
use App\Result;
use Auth;

class ResultController extends Controller
{
    public function show($id){
    	

        //Check user is not empty
        
        if(!empty(Auth::id())){
            $test = Test::with('user')->find($id);
            $totalQuestion = Question::count();
            if (!empty($test)) {
                $results = TestAnswer::where('test_id', $id)->where('user_id',$test->user->id)
                    ->with('question')->with('question.answers')->get();
            }
            $totalAttempted = $results = TestAnswer::where('test_id', $id)->where('user_id',$test->user->id)->get();
            $result = Result::with('questions')->where('test_id',$test->id)->where('user_id',$test->user->id)->first();
            
            $percentage = $result->percentage;
            
            return view('frontend.results.show',compact('test','result','percentage'));
        }
        
        $test = Test::find($id);
        if(!empty($test)){
            $result = Result::with('questions')->where('test_id',$test->id)->first();
        }

        return view('frontend.results.marks',compact('result'));
    }
}
