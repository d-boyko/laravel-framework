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
     * @return User
     */
    public function handle(UserRegistrationRequest $request): User
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
