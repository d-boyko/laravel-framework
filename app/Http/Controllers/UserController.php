<?php

// DONE
namespace App\Http\Controllers;

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
        // Get all the rows from users table
//        foreach (User::all() as $user) {
//            echo $user->name;
//        }

        $users = User::all()

        foreach ($users as $user) {
            echo $user->name;
            echo $user->email;
        }
    }
}
