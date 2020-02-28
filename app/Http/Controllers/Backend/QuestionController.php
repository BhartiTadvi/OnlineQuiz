<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Question;
use App\Option;
use App\Answer;
use App\Group;
use App\QuestionAnswer;
use App\QuestionGroup;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions =Question::get();
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
        return view('questions.create',compact('groups'));
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
        $questionObj->save();

        $questionGroup = new QuestionGroup();
        $questionGroup->question_id = $questionObj->id;
        $questionGroup->group_id = $request->group_id;
        $questionGroup->save();

        $options = $request->option;

        foreach ($options as $key => $createOption) {

            $optionObj = new Answer();
            $optionObj->answer = $createOption;
            $optionObj->save();

            $questionAnswerObj = new QuestionAnswer();
            $questionAnswerObj->question_id = $questionObj->id;
            $questionAnswerObj->answer_id = $optionObj->id;
            
            if($key == $request->correct_answer){
                $questionAnswerObj->correct_answer = 1;
            }
            $questionAnswerObj->save();
        }
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
        $question = Question::findOrFail($id);
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.edit', compact('question'));
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
          
        $questionObj = Question::find($id);
        $questionObj->question = $request->question;
        $questionObj->is_active = $request->status;
        $questionObj->save();
        
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
        return redirect()->route('question-index')->with('success', 'Question deleted successfully');
    }
}
