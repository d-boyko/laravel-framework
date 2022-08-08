<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function getOrdersList()
    {
        $order = (object)[
            'number' => 10000,
            'cost' => 3000,
            'name' => 'Daniil'
        ];
        $list = array_fill(0, 10, $order);

        return view('orders.index', compact('list'));
    }

    public function getCurrentOrder($id)
    {
        $id = (object)[
            'number' => 3241,
            'cost' => 42000,
            'name' => 'Thomas',
        ];

        return view('orders.order', compact('id'));
    }
}
