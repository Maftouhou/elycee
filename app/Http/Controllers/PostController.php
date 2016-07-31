<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Post;
use App\User;
use App\Comment;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    private function notifications($postTitle)
    {
        return $NotificationMessage = [

            'success'   => [
                    'create'    => 'L\'article a été enregistrer correctement',
                    'store'     => 'Article créer avec succès',
                    'update'    => 'Article mit a jour avec succès',
                    'destroy'   => 'L\'article '.$postTitle.' est supprimé avec succès'
                ],

            'failure'   => [
                    'create'    => '',
                    'store'     => '',
                    'update'    => '',
                    'destroy'   => ''
                ]
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) 
        {
            $posts      = Post::all();
            $class      = 'menu_teacher';
            $comments   = Comment::all();
            $user_role  = Auth::user()->role;
            
            return view('admin.dashboard.index', compact('posts', 'comments', 'user_role'))
                    ->with('class', $class);
        }  
        else 
        {
            
            return view('auth.login');
        }
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * Prevoire un message en cas d'un Article innexistant
         */
        $singlePost = Post::find($id);
        
        return $singlePost;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editPost = Post::find($id);
        
        return $editPost;
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
