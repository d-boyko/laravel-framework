<?php

// DONE
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUsersList(): void
    {
        $query = User::all();

        foreach ($query as $row) {
            echo $row->name . '<br>';
            echo $row->email . '<br>';
            echo '<br>';
        }
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
