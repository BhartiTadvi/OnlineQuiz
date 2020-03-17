<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelGroup extends Model
{
    protected $table = 'levels_groups';

    protected $fillable = [
        'id', 'level_id','group_id',
    ];

    public function level() 
   {   
    return $this->belongsTo('App\Level','level_id','id');
   }

   public function group() 
   {   
    return $this->belongsTo('App\Group','group_id','id');
   }
}
