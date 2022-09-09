<?php

namespace App\Actions;

use App\Contracts\RegisterActionContract;
use App\Http\Requests\RegistrationProcess\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterUserAction implements RegisterActionContract
{
    /**
     * @param UserRegistrationRequest $request
     * @return UserRegistrationRequest
     */
    public function handle(UserRegistrationRequest $request): UserRegistrationRequest
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        Auth::login($user);

        return $user;
    }
}
