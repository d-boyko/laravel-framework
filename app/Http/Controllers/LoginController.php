<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginProcess\UserLoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function index(): Application|Factory|View|RedirectResponse|Redirector
    {
        if (Auth::check()) {
            return view('user.private-page', [
                'data' => Auth::user(),
            ]);
        }
        return view('login.index');
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function store(UserLoginRequest $request)
    {
        if (Auth::check()) {
            return redirect(route('private-page'));
        }

        $fields = $request->only(['email', 'password']);

        if (Auth::attempt($fields)) {
            return redirect()->intended(route('private-page'));
        }

        return redirect(route('login'));
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
