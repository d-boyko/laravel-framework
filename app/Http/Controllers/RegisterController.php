<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
//        $request = app('request');
//        dd(app()->make('request'));
//        dd(app('request'));
//        dd($request);

//        $request = request();
//        dd($request);

//        $data = $request->all();
//        $data = $request->only(['name', 'email']);

//        $data = $request->except(['name', 'email']);

        $name = $request->input('name');
        $email = $request->email;
        $password = $request->password;
//        $remember = !! $request->Remember;
//        $avatar = $request->file('avatar');
        $agreement = $request->boolean('Remember');

//        dd($name, $email, $password, $agreement);
//        return 'Request to registrate';

        if (true) {
            return redirect()->back()->withInput();
        }
    }
}
