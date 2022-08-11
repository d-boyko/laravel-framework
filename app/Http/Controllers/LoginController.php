<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
//        return app('view')->make('login.index');
//        return view()->make('login.index');
//        return \Illuminate\Support\Facades\View::make('login.index');
        return view('login.index');
    }

    public function store(): int
    {
        return 0;
    }
}
