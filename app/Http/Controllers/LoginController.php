<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(): Factory|View|Application
    {
//        return app('view')->make('login.index');
//        return view()->make('login.index');
//        return \Illuminate\Support\Facades\View::make('login.index');
        return view('login.index');
    }

    public function store(Request $request)
    {
//        $ip = $request->ip();
//        $path = $request->path();
//        $url = $request->url();
//        $fullUrl = $request->fullUrl();
//
//        dd($ip, $path, $url, $fullUrl);
//
//        $email = $request->email;
//        $password = $request->password;
//        $agreement = $request->boolean('Remember');
//
//        dd($email, $password, $agreement);

//        return response('Request to login');

//        return response()->redirectTo('/foo');
//        return response()->redirectToRoute('user');
        $session = app()->make('session');
        dd($session);

//        if (true) {
//            return redirect()->back()->withInput();
//        }
    }
}
