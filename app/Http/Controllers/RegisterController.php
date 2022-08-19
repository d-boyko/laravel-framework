<?php

namespace App\Http\Controllers;

use App\Events\CreateUserEvent;
use App\Http\Requests\RegisterProcess\UserRegistrationRequest;
use App\Jobs\AddUserInfoToUsersTable;
use JetBrains\PhpStorm\NoReturn;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    #[NoReturn] public function store(UserRegistrationRequest $request)
    {
        $userInfo = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'agreement' => $request->agreement,
            'age' => $request->age,
        ];


        AddUserInfoToUsersTable::dispatch(
            $userInfo['name'],
            $userInfo['email'],
            $userInfo['password'],
            $userInfo['agreement'],
            $userInfo['age'],
        );
        event(new CreateUserEvent($userInfo));

        return redirect(route('home'));
    }
}
