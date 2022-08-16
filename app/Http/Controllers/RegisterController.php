<?php

namespace App\Http\Controllers;

use App\Jobs\AddUserInfoToUsersTable;
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

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
//        $remember = !! $request->Remember;
//        $avatar = $request->file('avatar');
        $agreement = $request->agreement;
        $age = $request->age;

//        dd($name, $email, $password, $agreement);
//        return 'Request to registration';

        AddUserInfoToUsersTable::dispatch($name, $email, $password, $agreement, $age);
        redirect()->route('user.posts');
    }
}
