<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'user_id', 
        'question_id', 
        'status_question', 
        'note'
    ];
}
