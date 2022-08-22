<?php

namespace App\Contracts;

use App\Http\Requests\RegistrationProcess\UserRegistrationRequest;

interface RegisterActionContract
{
    public function handle(UserRegistrationRequest $request);
}
