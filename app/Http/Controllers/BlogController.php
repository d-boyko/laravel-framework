<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $response = Post::all();
        return view('blog.index', compact('response'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('blog.show', compact('post'));
    }
}
