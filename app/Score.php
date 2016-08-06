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
        
        $score_Obj = (Array) $score;
        
        foreach ($score_Obj as $key => $score_1)
        {
            foreach ($score_1 as $n_key => $n_valu)
            {
                echo $n_valu->note;
                # dd($n_valu->note);
                
            }
        }
        
//        if( $score[0]['note'] === 2)
//        {
//            return 2;
//        }elseif($score[0]['note'] === 0)
//        {
//            return 0;
//        }

//        dd($score[0]['note']);
//        return $score[0]['note'];
    }
}
