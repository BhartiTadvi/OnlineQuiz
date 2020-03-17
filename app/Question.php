<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{	
    use SoftDeletes;

    protected $fillable = [
        'question','level_id',
    ];

    public function answers()
    {
    	return $this->hasMany('App\Answer','question_id','id');
    }

    public function questionGroup(){   
    	return $this->hasMany('App\QuestionGroup');
    }

    public function group(){
        return $this->belongsTo('App\Group');
    }
    public function level(){
        return $this->belongsTo('App\Level','level_id');
    }
}
