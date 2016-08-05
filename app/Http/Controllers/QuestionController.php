<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

use App\Choice;

use App\Score;

use Auth;

class QuestionController extends Controller
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
        if (Auth::user()->role === 'terminal') 
        {
            $questions  = Question::where([
                'class'     => 'terminal',
                'status'    => 'publish'
            ])->get();
            
//            $score = Score::where([
//                'user_id'       => Auth::user()->id,
//                'question_id'   => '2'
//            ])->get();
            
//            dd($score);
            return view('admin.dashboard.reponse.main_reponse', compact('questions'));
        }
        else if (Auth::user()->role === 'premiere')
        {
            $questions  = Question::where([
                'class'     => 'premiere',
                'status'    => 'publish'
            ])->get();
            
            return view('admin.dashboard.reponse.main_reponse', compact('questions'));
        }
        else if (Auth::user()->role === 'teacher')
        {
            $questions  = Question::all();

            return view('admin.dashboard.question.main_quest', compact('questions'));
        }
        else
        {
            return redirect('api/dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role === 'teacher') {
            
            return view('admin.dashboard.question.create_quest');
        }

        return redirect('api/questions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        # Question::create($request->all());
        
        $question   = new Question;
        $choice_num = $request->choice_num;
        
        $question->user_id      = $request->user_id;
        $question->title        = $request->title;
        $question->content      = $request->content;
        $question->class        = $request->class;
        $question->status       = $request->status;
        
        $question->save();
        
        # dd($choice_num, $question);
        
        return view('admin.dashboard.question.choices.create_choice', compact('question', 'choice_num'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        
        return $question;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        
        return view('admin.dashboard.question.edit_quest', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        Question::findOrFail($id)->update($request->all());
        
        $choice = Choice::where([
            'question_id' => $id
        ])->with('question')->get();

        $choice_Arr         = json_decode($choice, true);
        $choice_Obj         = unserialize($choice_Arr[0]['content']);
        $content_choice_Arr = (array) $choice_Obj;
        $choice_num         = $content_choice_Arr['choice_num'];
        
        # dd('$choice_Arr', $choice_Arr, '$content_choice_Arr', $content_choice_Arr);
        # return redirect('api/questions');
        return view('admin.dashboard.question.choices.edit_choice', compact('choice_Arr', 'content_choice_Arr', 'choice_num'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        Choice::where('question_id', $id)->delete();
        
        return redirect('api/questions');
    }
}
