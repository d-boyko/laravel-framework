<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class LoginController extends Controller
{
    public function index(): Factory|View|Application
    {
//        return app('view')->make('login.index');
//        return view()->make('login.index');
//        return \Illuminate\Support\Facades\View::make('login.index');
        return view('login.index');
    }

    #[NoReturn] public function store()
    {
        $session = app()->make('session');
        dd($session);
    }
}
