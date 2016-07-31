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
    public function index()
    {
        if (Auth::user()->role === 'terminal') 
        {
            $class      = 'menu_terminal';
            $questions  = Question::where('role', 'terminal');

            return view('admin.dashboard.reponse.main', compact('questions'))->with(['class' => $class]);
        }
        else if (Auth::user()->role === 'premiere')
        {
            $class      = 'menu_premiere';
            $questions  = Question::where('role', 'terminal');

            return view('admin.dashboard.reponse.main', compact('questions'))->with(['class' => $class]);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function answer($id)
    {
        
    }
}
