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
        'url_thumbnail', 
        'date', 
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
