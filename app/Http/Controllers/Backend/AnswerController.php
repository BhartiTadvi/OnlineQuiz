<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $perPage = 12;
        $answers = Answer::paginate($perPage);
        return view('answers.index',compact('answers'));
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = Answer::find($id);

        try {
            if($answer){
                return view('answers.show',compact('answer'));
            }else{
                return redirect()->route('answer-index')->with('errmsg', 'Answer not found');
            }
        }catch(\Throwable $th){
            return redirect()->route('answer-index')->with('errmsg', 'Something went wrong!');
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
        $answer = Answer::find($id);

        try {
            if($answer){
                return view('answers.edit',compact('answer'));
            }else{
                return redirect()->route('answer-index')->with('errmsg', 'Answer not found');
            }
        }catch(\Throwable $th){
            return redirect()->route('answer-index')->with('errmsg', 'Something went wrong!');
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
            'answer'=>'required', 
        ]);
        
        $answerObj = Answer::find($id);
        $answerObj->answer =$request->answer;
        
        if($answerObj->save()){
            return redirect()->route('answer-index')->with('success', 'Answer updated successfully');
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
        Answer::destroy($id);
        return redirect()->route('answer-index')->with('success', 'Option deleted successfully');
    }
}
