<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;

use App\User;

use App\Post;

use Auth;

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
    
    public function dashboard()
    {
        if (Auth::user()) 
        {
            $posts      = Post::all();
            $comments   = Comment::all();
            $user_role  = Auth::user()->role;
            
            return view('admin.dashboard.index', compact('posts', 'comments', 'user_role'));
        }  
        else 
        {
            
            return view('auth.login');
        }
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
            $comments   = Comment::all();
            $user_role  = Auth::user()->role;
            
            return view('admin.dashboard.post.main_post', compact('posts', 'comments', 'user_role'));
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
        if (Auth::user()->role === 'teacher') {
            
            return view('admin.dashboard.post.create_post');
        }

        return redirect('api/post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if (Auth::user()->role === 'teacher') 
        {
            $post       = new Post;
            
            $dirUpload  = public_path(env('UPLOAD_PICTURE', 'uploads'.DIRECTORY_SEPARATOR.'images'));
            $uri        = time().'_'.Auth::user()->id.'.jpg';
            
            $post->title            = $request->title;
            $post->abstract         = str_limit($request->content, 30);
            $post->content          = $request->content;
            # $post->date           = date("d-m-Y h:i:sa");
            $post->status           = $request->status;
            
            if ($request->url_thumbnail) 
            {
                $post->url_thumbnail    = $uri;
                $request->file('url_thumbnail')->move($dirUpload, $uri);
            }
            
            $post->save();
            
            return redirect('api/post');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::find($id);
        $comment    = Comment::all();
        
        # return $singlePost;
        return view('admin.dashboard.post.main_comments', compact('post', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        return view('admin.dashboard.post.edit_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        
        $dirUpload  = public_path(env('UPLOAD_PICTURE', 'uploads'.DIRECTORY_SEPARATOR.'images'));
        $uri        = time().'_'.Auth::user()->id.'.jpg';

        $post->title            = $request->title;
        $post->abstract         = str_limit($request->content, 30);
        $post->content          = $request->content;
        # $post->date           = date("d-m-Y h:i:sa");
        $post->status           = $request->status;

        if ($request->url_thumbnail) 
        {
            if(file_exists($dirUpload.DIRECTORY_SEPARATOR.$post->url_thumbnail) === true && $post->url_thumbnail !== '')
            {
                unlink($dirUpload.DIRECTORY_SEPARATOR.$post->url_thumbnail);
            }
            
            $post->url_thumbnail = $uri;
            $request->file('url_thumbnail')->move($dirUpload, $uri);
        }

        $post->save();
        
        return redirect('api/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dirUpload  = public_path(env('UPLOAD_PICTURE', 'uploads'.DIRECTORY_SEPARATOR.'images'));
        $post = Post::findOrFail($id);
        
        $post->delete();
        if(file_exists($dirUpload.DIRECTORY_SEPARATOR.$post->url_thumbnail) === true && $post->url_thumbnail !== '')
        {
            unlink($dirUpload.DIRECTORY_SEPARATOR.$post->url_thumbnail);
        }
        
        return redirect('api/post');
    }
}
