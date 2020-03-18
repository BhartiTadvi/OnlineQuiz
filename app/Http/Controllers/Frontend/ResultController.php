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
    	

        /*  Check user is not empty.
            Display result of log in user. 
        */      
        if(!empty(Auth::id())){
            $test = Test::with('user')->find($id);
            $totalQuestion = Question::count();
            
            if (!empty($test)) {

                $result = Result::with('questions')->where('test_id',$test->id)->where('user_id',$test->user->id)->first();
                
                $percentage = $result->percentage;

                return view('frontend.results.show',compact('test','result','percentage'));
            }
            else{
                return "Result not found";
            }
        }

        /* Display result of Anynoums  User */  

        $test = Test::find($id);
        if(!empty($test)){
            $result = Result::with('questions')->where('test_id',$test->id)->first();
        }

        return view('frontend.results.marks',compact('result'));
    }
}
