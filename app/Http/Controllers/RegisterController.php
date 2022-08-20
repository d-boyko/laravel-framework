<?php

namespace App\Http\Controllers;

use App\Events\CreateUserEvent;
use App\Http\Requests\RegisterProcess\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\NoReturn;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect(route('private-page'));
        }
        return view('register.index');
    }

    #[NoReturn] public function store(UserRegistrationRequest $request)
    {
        if (Auth::check()) {
            return redirect(route('private-page'));
        }

        if (User::where(column: 'email', operator: '=', value: $request->email)->exists()) {
            return redirect(route('home'));
        };

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        event(new CreateUserEvent($user));

        if ($user) {
            Auth::login($user);
        }

        return redirect(route('private-page'));
    }
}
