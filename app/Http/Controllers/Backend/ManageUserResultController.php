<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Result;
use App\Test;
use Auth;

class ManageUserResultController extends Controller
{	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(){
        $perPage = 10;
    	$results = Result::with('test','user')->paginate($perPage);
        if(!empty($results)){
        return view('manageuserresult.index',compact('results'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id){
    	
    	$result = Result::with('test','user')->find($id);
    	return view('manageuserresult.show',compact('result'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id){
     
     $result = Result::destroy($id);
     return redirect()->route('user-result-index')->with('success','User result deleted successfully');
    }
}
