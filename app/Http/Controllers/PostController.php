<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(): Factory|View|Application
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Jack\'s thing',
            'content' => '<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong>',
        ];

        $posts = array_fill(0, 10, $post);

        return view('user.posts.index', compact('posts'));
    }


    public function create(Request $request): Factory|View|Application
    {
        return view('user.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request): string
    {
        $title = $request->title;
        $content = $request->content;
        dd($title, $content);
        return 'Request to create a posts';
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

        return view('user.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Application|Factory|View
     */
    public function edit($post): View|Factory|Application
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Jack\'s thing',
            'content' => '<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong>',
        ];

        return view('user.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->title;
        $content = $request->content;
        dd($title, $content);
    }

    /**
     * @param $id
     * @return void
     */
    public function like($id): void
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
