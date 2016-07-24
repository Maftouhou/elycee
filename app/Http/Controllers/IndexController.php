<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Post;

class IndexController extends Controller
{
    public function index()
    {
        $title = "This is the data from IndexController";
        $user = User::all();
        
        return $user;
        //$posts = Post::all();
        

        // return view('index', compact('posts', 'title'))->render(); // équivaut à: ['posts'=> $post]
    }
}
