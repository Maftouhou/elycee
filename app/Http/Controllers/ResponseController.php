<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

use App\User;

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
    public function show($id)
    {
        if (Auth::user()->role === 'terminal') 
        {
            /**
             * recupearion des choix des reponses dans la tables Choices
             * et les envoyer à la vue
             */
            $questions  = Question::where('role', 'terminal');

            return view('admin.dashboard.reponse.create_reponse', compact('questions'));
        }
        else if (Auth::user()->role === 'premiere')
        {
            $questions  = Question::where('role', 'premiere');

            return view('admin.dashboard.reponse.create_reponse', compact('questions'));
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        
    }
}
