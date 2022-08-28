<?php

namespace App\Http\Controllers;

use App\Events\ForgotPasswordEvent;
use App\Http\Requests\ForgotPasswordProcess\ForgotPasswordRequest;
use App\Jobs\ForgotUserPasswordJob;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('user.forgot-password');
    }

    public function store(ForgotPasswordRequest $request)
    {
        $email = $request->input('email');
        $password = Str::random(10);
        dispatch(new ForgotUserPasswordJob($email, $password));
        event(new ForgotPasswordEvent($email, $password));
        return redirect(route('login'));
    }
}
