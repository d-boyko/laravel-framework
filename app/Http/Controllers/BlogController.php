<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Jack\'s thing',
            'content' => '<strong>Some text</strong>',
        ];

        $posts = array_fill(0, 10, $post);

//        return view('blog.index')
//            ->with('foo', 'bar')
//            ->with('baz', [1,2,3]);

//        return view('blog.index', [
//                'foo' => 'bar',
//                'posts' => $posts,
//                'baz' => [1,2,3]
//            ]
//        );

//        return view('blog.index', [
//                'foo' => $posts,
//                ]
//        );

        return view('blog.index', compact('posts'));
    }

    public function show($post)
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Jack\'s thing',
            'content' => '<strong>Some text</strong>',
        ];

        return view('blog.show', compact('post'));
    }
}
