<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $table = 'questions_options';

    protected $fillable = [
        'option', 'question_id','correct_option',
    ];
}
