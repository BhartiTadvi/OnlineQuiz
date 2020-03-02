<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    protected $table = 'test_answers';

    protected $fillable = [
        'id', 'user_id','test_id','question_id','answer_id','correct',
    ];
}
