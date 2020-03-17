<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\Level;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $perPage = 12;
        $groups = Group::paginate($perPage);
        return view('groups.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        return view('groups.create');
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
            'group_name'=>'required', 
            'status'=>'required', 
        ]);

        $groupObj = new Group();
        $groupObj->group_name = $request->group_name;
        $groupObj->is_active = $request->status;
        if($groupObj->save()){
           return redirect()->route('group-index')->with('success', 'New group added successfully'); 
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
        $group = Group::find($id);

        try {
            if($group){
                return view('groups.show',compact('group'));
            }else{
                return redirect()->route('group-index')->with('errmsg', 'Group not found');
            }
        }catch(\Throwable $th){
            return redirect()->route('group-index')->with('errmsg', 'Something went wrong!');
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
        $group = Group::find($id);

        try {
            if($group){
            return view('groups.edit',compact('group'));
        }else{
            return redirect()->route('group-index')->with('errmsg', 'Group not found');
        }
        }catch(\Throwable $th){
            return redirect()->route('group-index')->with('errmsg', 'Something went wrong!');
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
            'group_name'=>'required', 
            'status'=>'required', 
        ]);

        $groupObj = Group::find($id);
        
        if($groupObj){
            $groupObj->group_name = $request->group_name;
            $groupObj->is_active = $request->status;
            $groupObj->save();
            return redirect()->route('group-index')->with('success', 'Group updated successfully'); 
        }else{
            return redirect()->route('group-index')->with('errmsg', 'Group not found');
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
        if(!empty($id)){
            Group::destroy($id);
            return redirect()->route('group-index')->with('success', 'Group deleted successfully');   
        }
        return redirect()->route('group-index')->with('errmsg', 'Group not found');
    }
}
