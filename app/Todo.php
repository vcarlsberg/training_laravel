<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    
    protected $fillable=['title','description'];

    //mutator
    function getTitleAttribute($value)
    {
        return strtoupper($value);
    }
}
