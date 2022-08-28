<?php

namespace App\Http\Controllers;

use App\Actions\CreatePostAction;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\NoReturn;

class PostController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $response = Post::all();
        return view('blog.index', compact('response'));
    }


    public function create(CreatePostAction $action)
    {
        $action->handle();
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

//        return redirect()->route('user.posts.show', 123);
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

        $this->validate($request, [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
        ]);

        return view('user.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update()
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
        $posts = Post::getCachedTable();
        return view('posts.index', compact('posts'));
    }
}
