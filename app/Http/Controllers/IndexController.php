<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    public function index()
    {
        $title = "This is the data from IndexController";
        return $title;
        //$posts = Post::all();

        // return view('index', compact('posts', 'title'))->render(); // équivaut à: ['posts'=> $post]
    }
}
