<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status', 1)
                ->orderBy('updated_at', 'desc')
                ->take(5)
                ->with('comment')
                ->get();

        return view('front.index', compact('posts'));
        # return $posts;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('id', $id)
                ->with('comment')
                ->get();
        # dd($post);
        # return $post;
        
        $post = $posts[0];
        return view('front.show', compact('post'));
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
    
    public function search(Request $request)
    {
        $expression = $request->get('exp');
        $title = 'Résultats de la recherche';

        $posts = Post::with('user')->where('status', 1)->where(function ($query) use ($expression)
        {
            $query->orWhere('title', 'LIKE', "%$expression%");
            $query->orWhere('content', 'LIKE', "%$expression%");
        })->orderBy('created_at');
        
        $posts = $posts->paginate(10)->setPath('recherche?exp=' . $expression);

        return view('front.search_result', compact('expression', 'title', 'posts'));
    }
}
