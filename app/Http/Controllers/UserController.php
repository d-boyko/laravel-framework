<?php

// DONE
namespace App\Http\Controllers;

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

        return view('users.index', compact('response'));
    }

    public function getProfile($id): void
    {
        $query = DB::table('users')
            ->where('id', '=', $id)
            ->get();

        foreach ($query as $row) {
            echo 'PROFILE: ' . PHP_EOL;
            echo $row->name . PHP_EOL;
            echo $row->email . PHP_EOL;
            echo $row->email_verified_at . PHP_EOL;
            echo $row->password . PHP_EOL;
        }
    }

    public function getUserOrders($id): void
    {
        $query = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('users.id', '=', $id)
            ->select('users.*', 'orders.message', 'orders.*')
            ->get();

        foreach ($query as $row) {
            echo $row->name . '<br>';
            echo $row->email . '<br>';
            echo $row->message . '<br>';
            echo $row->cost . '<br>';
            echo '<br>';
        }
    }
}
