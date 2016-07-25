<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 
        'title', 
        'abstract', 
        'content', 
        'date', 
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo('User');
    }
}
