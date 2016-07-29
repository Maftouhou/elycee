<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'user_id', 
        'choice_id', 
        'choice_question_id', 
        'reponse'
    ];
}
