<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Jack\'s thing',
            'content' => '<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong>',
        ];

        $posts = array_fill(0, 10, $post);

        return view('users.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('users.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request): string
    {
        return 'Request to create a post';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $post
     */
    public function show($post)
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Jack\'s thing',
            'content' => '<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong>',
        ];

        return view('users.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($post)
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Jack\'s thing',
            'content' => '<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong>',
        ];

        return view('users.posts.edit', compact('post'));
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
     * @param $id
     * @return void
     */
    public function like($id)
    {

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
