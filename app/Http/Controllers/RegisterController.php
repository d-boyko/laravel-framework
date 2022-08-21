<?php

namespace App\Http\Controllers;

use App\Actions\RegisterUserAction;
use App\Http\Requests\RegistrationProcess\UserRegistrationRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        if (Auth::check()) {
            return view('user.private-page', [
                'data' => Auth::user(),
            ]);
        }
        return view('register.index');
    }

    /**
     * @param UserRegistrationRequest $request
     * @param RegisterUserAction $action
     * @return Application
     */
    public function store(UserRegistrationRequest $request, RegisterUserAction $action)
    {
        return view('user.private-page', [
            'data' => $action->handle($request),
        ]);
    }
}
