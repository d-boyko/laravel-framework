<?php

// DONE
namespace App\Http\Controllers;

use App\Models\Currency;
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
//        $users = User::all();
//        foreach ($users as $row) {
//            echo $users->name . PHP_EOL;
//            echo $users->email . PHP_EOL;
//        }

//        ELOQUENT: where clause by eloquent
//        $users = User::where('name', 'like', 'Prof%')
//            ->take(10)
//            ->get();
//
//        foreach ($users as $user) {
//            echo $user->name . PHP_EOL;
//            echo $user->email . PHP_EOL;
//            echo $user->password . PHP_EOL;
//            echo PHP_EOL;
//        }

        $user = User::where('name', '=', 'Test')->first();

//        ELOQUENT: do not touch current Model
//        $freshUser = $user->fresh();
//
//        ELOQUENT: updating the model and give you data
//        $user->name = 'SXOPE';
//        $user->refresh();
//        echo $user->name; // Test

//        ELOQUENT: viewing results by chunks
//        User::chunk(30, function ($users) {
//            foreach ($users as $user)
//            {
//                echo $user->name;
//            }
//        });
    }
}
