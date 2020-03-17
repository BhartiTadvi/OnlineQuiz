<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Option;
use App\Answer;
use App\Test;
use App\Level;
use App\TestAnswer;
use App\Group;
use Auth;
use App\Result;
use App\QuestionGroup;
use App\LevelGroup;
class TestController extends Controller
{   
    /**
     * Show the form for creating quiz.
     *
     * @return \Illuminate\Http\Response
    */
    public function getQuizview(){

        $levels = Level::get();
        
        $levelGroups = LevelGroup::with('level.groups.group.questions.question.answers')->get()->groupBy('level_id');
        
        $questions = Question::with('level','answers')->get()->groupBy('level_id');
        if(!empty($questions)){
            $easy = $questions['1'];
            $moderate = $questions['2'];
            $difficult = $questions['3'];  
        }
      

        return view('frontend.test.quiz',compact('levelGroups','levels','questions','easy','moderate','difficult'));
    }

    public function getQuiz(){
        
        $groups = Group::get();

        $groupQuestions = QuestionGroup::with('question','group','question.answers')->get()->groupBy('group_id');

        $aptitudeQuestions = $groupQuestions['1'];
        $reasoningQuestions = $groupQuestions['2'];
        $programmingQuestions = $groupQuestions['3'];

        return view('frontend.test.test',compact('groups','groupQuestions','aptitudeQuestions','reasoningQuestions','programmingQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $questions = Question::with('answers')->get();

        return view('frontend.test.create',compact('questions'));
    }


    /**
     * Show the form for storing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $result = 0;
        
        /* If Auth User is not empty then he is able to submit the test */

        if(!empty(Auth::id())){

            /* Store test */

            $test = Test::create([
                'user_id' => Auth::id(),
                'result'  => $result,
            ]);
            foreach ($request->input('questions', []) as $key => $question) {
                $status = 0;

                $correctAnswer = Answer::find($request->input('answers.'.$question));
                 
                if ($request->input('answers.'.$question) != null && $correctAnswer->correct_option == 1) {
                    $status = 1;
                    $result++;
                }

                /* Store test with right or wrong answers */

               $testAnswer = TestAnswer::create([
                    'user_id'     => Auth::id(),
                    'test_id'     => $test->id,
                    'question_id' => $question,
                    'answer_id'   => $request->input('answers.'.$question),
                    'correct'     => $status,
                ]);
            }

            /* Update the result */
            $test->update(['result' => $result]);
            $getMarks = TestAnswer::where('test_id', $test->id)->where('user_id',Auth::id())->where('correct',1)->get();
            
            $obtainMarks = $getMarks->count() *2;
            $totalmarks = Question::get()->sum('mark');
            $percentage = intval(($obtainMarks/$totalmarks)*100);

            /* Store result of particular user */
            
            $result = new Result();
            $result->user_id = Auth::id();
            $result->test_id = $test->id;
            $result->obtained_marks = $obtainMarks;
            $result->total_marks = $totalmarks;
            $result->percentage = $percentage;
            $result->save();    
            return redirect()->route('result-show', [$test->id]);
        }

        /* Anynoums User also give the test */

        /* Store the test */
        $test = Test::create([
                'result'  => $result,
        ]);
        
        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            $correctAnswer = Answer::find($request->input('answers.'.$question));
             
            if ($request->input('answers.'.$question) != null && $correctAnswer->correct_option == 1) {
                $status = 1;
                $result++;
            }
           $testAnswer = TestAnswer::create([
                'test_id'     => $test->id,
                'question_id' => $question,
                'answer_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);
        }

        /* Update result */

        $test->update(['result' => $result]);
        $getMarks = TestAnswer::where('test_id', $test->id)->where('correct',1)->get();

        $obtainMarks = $getMarks->count() *2;
        $totalmarks = Question::get()->sum('mark');
        $percentage = ($obtainMarks/$totalmarks)*100;
        
        /* Store result of Anynoums user */
            
        $result = new Result();
        $result->test_id = $test->id;
        $result->obtained_marks = $obtainMarks;
        $result->total_marks = $totalmarks;
        $result->percentage = $percentage;
        $result->save();
        return redirect()->route('result-show', [$test->id]);
    }    
}
