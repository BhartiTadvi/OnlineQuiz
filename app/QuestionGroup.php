<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionGroup extends Model
{
    protected $table = 'group_question';

    protected $fillable = [
        'id', 'question_id','group_id',
    ];
}
