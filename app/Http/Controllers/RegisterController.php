<?php

namespace App\Http\Controllers;

use App\Jobs\AddUserInfoToUsersTable;
use App\Mail\RegisterMail;
use Illuminate\Console\Application;
use Illuminate\Console\View\Components\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        /*
        $request = app('request');
        dd(app()->make('request'));
        dd(app('request'));
        dd($request);
        $request = request();
        dd($request);
        $data = $request->all();
        $data = $request->only(['name', 'email']);
        $data = $request->except(['name', 'email']);
        */

        validator($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:100'],
            'password' => ['required', 'string'],
            'agreement' => ['accepted'],
            'number' => ['required', 'integer', 'max:100'],
        ])->validate();

        AddUserInfoToUsersTable::dispatch(
            $request->input('name'),
            $request->input('email'),
            $request->input('password'),
            $request->input('agreement'),
            $request->input('number'),
        );

        Mail::to('boyko.d.a@yandex.ru')->send(new RegisterMail(
            $request->input('name'),
            $request->input('email'),
            $request->input('password'),
        ));
        return redirect(route('home'));
    }
}
