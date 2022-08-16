<?php

// DONE
namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Illuminate\Contracts\Foundation\Application;

class UserController extends Controller
{
    public function getUsersList(): Factory|View|Application
    {
        $response = DB::table('users')
            ->select('*')
            ->get();

        return view('user.index', compact('response'));
    }

    public function test()
    {
//        ELOQUENT: all the columns
        $users = User::all();
        foreach ($users as $row) {
            echo $row->name . PHP_EOL;
            echo $row->email . PHP_EOL;
        }

//        ELOQUENT: where clause by eloquent
        $users = User::where('name', 'like', 'Prof%')
            ->take(10)
            ->get();

        foreach ($users as $user) {
            echo $user->name . PHP_EOL;
            echo $user->email . PHP_EOL;
            echo $user->password . PHP_EOL;
            echo PHP_EOL;
        }
//        return view('models-tester', compact('user'));

        $userInfo = User::where('name', 'LIKE', 'Prof.%')->first();

//        return view('models-tester', compact('userInfo'));

//        ELOQUENT: updating the model and give you data
//        $user->name = 'SXOPE';
//        $user->refresh();
//        echo $user->name;

//        ELOQUENT: viewing results by chunks
        User::chunk(30, function ($users) {
            foreach ($users as $user)
            {
                echo $user->name;
            }
        });

//        ELOQUENT: update by ChunkId
//        $update = User::where('is_active', true)
//            ->chunkById(200, function ($users) {
//                $users->each->update(['is_active' => false]);
//            }, $column = 'id');
//
//        ELOQUENT: Find some post from user_id
        $response = User::find(17)->post()->orderByDesc('title')->take(10)->get();

        foreach ($response as $post) {
            echo $post->title . PHP_EOL;
        }

        $response = Post::find(17)->user()->get();

        foreach ($response as $user) {
            echo $user->name;
        }
    }
}
