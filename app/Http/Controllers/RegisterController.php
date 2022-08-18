<?php

namespace App\Http\Controllers;

use App\Events\UserRegistrationEvent;
use App\Jobs\AddUserInfoToUsersTable;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    #[NoReturn] public function store(Request $request)
    {
        validator($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:100'],
            'password' => ['required', 'string'],
            'agreement' => ['accepted'],
            'age' => ['required', 'integer', 'max:100'],
        ])->validate();

        $userInfo = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'agreement' => $request->agreement,
            'age' => $request->age,
        ];

        event(new UserRegistrationEvent($userInfo));

        AddUserInfoToUsersTable::dispatch(
            $userInfo['name'],
            $userInfo['email'],
            $userInfo['password'],
            $userInfo['agreement'],
            $userInfo['age'],
        );

        return redirect(route('home'));
    }
}
