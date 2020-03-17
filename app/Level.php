<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';

    protected $fillable = [
        'id', 'level_name',
    ];

    public function groups(){
    	return $this->hasMany('App\LevelGroup');
    }
    
}
