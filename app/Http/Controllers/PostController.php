<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\NoReturn;

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
     * @throws ValidationException
     */
//    #[NoReturn] public function store(StorePostRequest $request): string
    #[NoReturn] public function store(Request $request): string
    {
//        $validated = validator($request->all(), [
//            'title' => ['required', 'string', 'max:100'],
//            'content' => ['required', 'string', 'max:10000'],
//        ])->validate();

//        $validated = $request->validate([
//            'title' => ['required', 'string', 'max:100'],
//            'content' => ['required', 'string', 'max:10000'],
//        ]);

//        $validated = $request->validated();
//        dd($validated);
//        $title = $request->input('title');
//        $content = $request->input('content');

        $validated = $this->validate($request, [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
        ]);
        dd($validated);

//        if (true) {
//            throw ValidationException::withMessages([
//                'account' => __('Not enough resources'),
//            ]);
//        }

        return redirect()->route('user.posts.show', 123);
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     * @throws ValidationException
     */
    public function show()
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
     * @param Request $request
     * @return Application|Factory|View
     * @throws ValidationException
     */
    public function edit(Request $request): View|Factory|Application
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Jack\'s thing',
            'content' => '<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong>',
        ];

        $validated = $this->validate($request, [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
        ]);
        dd($validated);

        return view('user.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        return redirect()->back();
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
     * @return RedirectResponse
     */
    public function delete(): RedirectResponse
    {
        return redirect()->route('user.posts');
    }

    public function getPosts(): Factory|View|Application
    {
        $posts = DB::table('users')
            ->leftJoin('posts', 'id','=', 'user_id')
            ->select('users.name as name', 'posts.title as title', 'posts.content as content');

        return view('posts.index', compact('posts'));
    }
}
