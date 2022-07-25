<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getOrdersList(): void
    {
        $query = Order::all();

        foreach($query as $row) {
            echo $row->message . '<br>';
            echo $row->cost . '<br>';
            echo '<br>';
        }
    }

    public function getCurrentOrder($id): void
    {
        $query = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where('orders.id', '=', $id)
            ->select('users.name', 'users.email', 'message', 'cost')
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
