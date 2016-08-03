<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'user_id', 
        'title', 
        'content', 
        'class', 
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function choice()
    {
        return $this->hasMany('App\Choice');
    }
}
