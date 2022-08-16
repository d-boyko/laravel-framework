<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->search;
        $category_id = $request->category_id;

//        dd($search, $category_id);

        $post = (object) [
            'id' => 123,
            'title' => 'Jack\'s thing',
            'content' => '<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong>',
            'category_id' => 1
        ];

        $posts = array_fill(0, 10, $post);

        $posts = array_filter($posts, function($post) use ($search, $category_id) {
            if ($search && ! str_contains($post->title, $search)) {
                return false;
            }

            if ($category_id && $post->category_id != $category_id) {
                return true;
            }

            return true;
        });

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
            'content' => '<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong>',
        ];

        return view('blog.show', compact('post'));
    }
}
