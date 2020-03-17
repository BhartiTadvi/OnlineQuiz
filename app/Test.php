<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
 	protected $table = 'test';

    protected $fillable = [
        'id', 'user_id','result',
    ];

    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }
    
}
