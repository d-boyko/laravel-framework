<?php

namespace App\Http\Controllers;

use App\Events\CreateUserEvent;
use App\Http\Requests\RegisterProcess\UserRegistrationRequest;
use App\Jobs\AddUserInfoToUsersTable;
use App\Models\User;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    #[NoReturn] public function store(UserRegistrationRequest $request)
    {
        $userInfo = $request->all();
        dispatch(new AddUserInfoToUsersTable($userInfo));
        event(new CreateUserEvent($userInfo));

        return redirect(route('home'));
    }
}
