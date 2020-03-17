<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Group extends Model
{
    use SoftDeletes;

    protected $table = 'groups';

    protected $fillable = [
        'id', 'group_name',
    ];

    public function levelGroup(){   
    	return $this->hasMany('App\LevelGroup');
    }

   	public function questions(){
    	return $this->hasMany('App\QuestionGroup');
    }
}
