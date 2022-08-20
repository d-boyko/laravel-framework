<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\CreateUserEvent;
use App\Http\Requests\RegistrationProcess\UserRegistrationRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect(route('private-page'));
        }
        return view('register.index');
    }

    /**
     * @param UserRegistrationRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(UserRegistrationRequest $request)
    {
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
