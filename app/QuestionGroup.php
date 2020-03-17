<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionGroup extends Model
{
    protected $table = 'group_question';

    protected $fillable = [
        'id', 'question_id','group_id',
    ];

    public function question() 
   {   
    return $this->belongsTo('App\Question','question_id','id');
   }

   public function group() 
   {   
    return $this->belongsTo('App\Group','group_id','id');
   }
}
