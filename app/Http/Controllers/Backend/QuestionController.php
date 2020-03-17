<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Question;
use App\Option;
use App\Answer;
use App\Group;
use App\Level;
use App\QuestionAnswer;
use App\QuestionGroup;
use App\LevelGroup;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $perPage = 8;
        $questions = Question::paginate($perPage);
        return view('questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $groups = Group::where('is_active','active')->get();
        $levels = Level::where('is_active','active')->get();
        return view('questions.create',compact('groups','levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'question'=>'required', 
            'status'=>'required', 
        ]);
        
        $questionObj = new Question();
        $questionObj->question = $request->question;
        $questionObj->is_active = $request->status;
        $questionObj->level_id =  $request->level_id;
        $questionObj->save();

        $questionGroup = new QuestionGroup();
        $questionGroup->question_id = $questionObj->id;
        $questionGroup->group_id = $request->group_id;
        $questionGroup->save();

        $options = $request->option;

        foreach ($options as $key => $createOption) {

            $optionObj = new Answer();
            $optionObj->answer = $createOption;
            $optionObj->question_id =  $questionObj->id;
            
            if($key == $request->correct_answer){
                $optionObj->correct_option = 1;
            }
            $optionObj->save();
        }
        
        $levelGroupObj = new LevelGroup();
        $levelGroupObj->level_id = $request->level_id;
        $levelGroupObj->group_id = $request->group_id;
        $levelGroupObj->save();

        return redirect()->route('question-index')->with('success', 'New question added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::with('questionGroup.group','answers')->find($id);

        try {
            if($question){
                return view('questions.show', compact('question'));
            }else{
                return redirect()->route('question-index')->with('errmsg', 'Question not found');
            }
        }catch(\Throwable $th){
            return redirect()->route('question-index')->with('errmsg', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::with('questionGroup.group','answers')->find($id);
        $groups = Group::where('is_active','active')->get();
        $levels = Level::where('is_active','active')->get();
       
        try {
            if($question){
                return view('questions.edit',compact('question','groups','levels'));
            }else{
                return redirect()->route('question-index')->with('errmsg', 'Question not found');
            }
        }catch(\Throwable $th){
            return redirect()->route('question-index')->with('errmsg', 'Something went wrong!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question'=>'required', 
            'status'=>'required', 
        ]);
          
        $questionObj = Question::with('answers')->find($id);
        $questionObj->question = $request->question;
        $questionObj->is_active = $request->status;
        
        if($questionObj->save()){
            return redirect()->route('question-index')->with('success', 'Question updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return redirect()->route('question-index')->with('errmsg', 'Question deleted successfully');
    }
}
