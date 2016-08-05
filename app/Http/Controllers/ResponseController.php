<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Response;

use App\Question;

use App\Choice;

use App\Score;

use Auth;

class ResponseController extends Controller
{
    
    public function __construct() {
        
        return;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $choice_repose  = $request->choice_repose;
        
        $choice = Choice::where([
            'id'            => $request->choice_id,
            'question_id'   => $request->question_id
        ])->get();

        $choice_Arr = json_decode($choice, true);
        $choice_Obj = unserialize($choice_Arr[0]['content']);
        $content_choice_Arr = (array) $choice_Obj;
        
        function getNextItem($array, $key)
        {
            $keys = array_keys($array);
            if ( (false !== ($p = array_search($key, $keys))) && ($p < count($keys) - 1) ) {
                return array($keys[++$p] => $array[$keys[$p]]);
            }
            else { return false; }
        }
        
        $correct = getNextItem($content_choice_Arr, $choice_repose);
        foreach ($correct as $r_key => $r_val)
        {
            $user_response = $r_val;
        }
        
        $save_reposne = new Response;
        $save_reposne->user_id              = $request->user_id;
        $save_reposne->choice_id            = $request->choice_id;
        $save_reposne->choice_question_id   = $request->question_id;
        $save_reposne->reponse              = $user_response;
        
        $save_reposne->save();
        
        # $score = new Score;
        $score = Score::findOrFail($request->score_id);
        
        if ($user_response === 0) { $score->note = 0; }
        else { $score->note = 2; }
        
        $score->save();
        
        return redirect('api/questions');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $check_done = Score::where([
            'question_id'       => $id,
            'user_id'           => Auth::user()->id,
            'status_question'   => 'done',
        ])->get();
        
        # dd(count($check_done), $check_done);
        
        if (count($check_done) === 0) 
        {
            $score  = new Score;
            $score->user_id         = Auth::user()->id;
            $score->question_id     = $id;
            $score->status_question = 'done';
            
            $score->save();
            
            $choice = Choice::where([
                'question_id' => $id
            ])->with('question')->get();

            $choice_Arr = json_decode($choice, true);
            $choice_Obj = unserialize($choice_Arr[0]['content']);
            $content_choice_Arr = (array) $choice_Obj;

            return view('admin.dashboard.reponse.create_reponse', compact('choice_Arr', 'content_choice_Arr', 'score'));
        }
        else
        {
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
