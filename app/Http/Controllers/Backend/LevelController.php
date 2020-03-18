<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 12;
        $levels = Level::paginate($perPage);
        return view('levels.index',compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
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
            'level_name'=>'required', 
            'status'=>'required', 
        ]);

      try {
            $levelObj = new Level();
            $levelObj->level_name = $request->level_name;
            $levelObj->is_active = $request->status;
            if($levelObj->save()){
                return redirect()->route('level-index')->with('success', 'New level added successfully');
            }
            }catch(\Throwable $th){
                return redirect()->route('level-index')->with('errMsg', 'Something went wrong!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level = Level::find($id);

        try {
            if($level){
                return view('levels.show',compact('level'));
            }else{
                return redirect()->route('level-index')->with('errmsg', 'Level not found');
            }
        }catch(\Throwable $th){
            return redirect()->route('level-index')->with('errmsg', 'Something went wrong!');
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
        $level = Level::find($id);

        try {
            if($level){
            return view('levels.edit',compact('level'));
            }else{
                return redirect()->route('level-index')->with('errmsg', 'Level not found');
            }
        }catch(\Throwable $th){
            return redirect()->route('level-index')->with('errmsg', 'Something went wrong!');
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
            'level_name'=>'required', 
            'status'=>'required', 
        ]);

        $levelObj = Level::find($id);
        $levelObj->level_name = $request->level_name;
        $levelObj->is_active = $request->status;
        $levelObj->save();
        return redirect()->route('level-index')->with('success', 'Level updated successfully');
    }

       
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Level::destroy($id);
        return redirect()->route('level-index')->with('success', 'Level deleted successfully'); 
    }
}
