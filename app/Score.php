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
    
    public function scopeStatusDone($query, $quest_id, $usr_id)
    {
        $score = Score::where([
            'user_id'       => $usr_id,
            'question_id'   => $quest_id
        ])->get();
        
        if(count($score) === 1)
        {
            return 'Fait';
        }else
        {
            return 'A_faire';
        }
    }
    
    public function scopeNote($query, $quest_id, $usr_id)
    {
        $score = Score::select('note')->where([
            'user_id'       => $usr_id,
            'question_id'   => $quest_id
        ])->get();

        return $score;
    }
}
