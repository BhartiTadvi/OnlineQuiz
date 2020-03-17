<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'result';

    protected $fillable = [
        'id', 'user_id','correct','question_id',
    ];

    public function questions(){
    	return $this->belongsTo('App\Question','question_id');
    }

    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function test(){
    	return $this->belongsTo('App\Test','test_id');
    }


}
