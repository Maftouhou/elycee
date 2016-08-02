<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\choice;

class ChoiceController extends Controller
{
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
        if (Auth::user()->role === 'teacher') {
            
            return view('admin.dashboard.question.choices.create_choice');
        }

        return redirect('api/questions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $choice_num = $request->choice_num;
        
//        for ($i = 0; $i < $choice_num; $i++)
//        {
//            $this->validate($request, [
//                'content_'.$i+1 => 'required',
//                'vrai_'.$i+1    => 'required',
//                'faux_s'.$i+1   => 'required',
//            ]);
//        }
        
        $data_choices           = $request->all();
        $data_choices_obj       = (object) $data_choices;
        $data_choices_obj_final = serialize($data_choices_obj);

        $choices = new Choice;
        
        $choices->question_id   = $request->question_id;
        $choices->content       = $data_choices_obj_final;
        
        $choices->save();
        
        return redirect('api/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
