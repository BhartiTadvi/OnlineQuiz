<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $table = 'questions_answers';

    protected $fillable = [
        'id', 'question_id','answer_id','correct_answer',
    ];
}
