<?php

namespace App\Actions;

use App\Events\CreateUserEvent;
use App\Http\Requests\RegistrationProcess\UserRegistrationRequest;
use App\Jobs\AddUserInfoToUsersTable;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterUserAction
{
    /**
     * @param UserRegistrationRequest $request
     * @return UserRegistrationRequest
     */
    public static function handle(UserRegistrationRequest $request): UserRegistrationRequest
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        event(new CreateUserEvent($request->all()));
        Auth::login($user);

        return $request;
    }
}
