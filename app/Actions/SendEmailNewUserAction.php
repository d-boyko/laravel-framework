<?php

namespace App\Actions;

use App\Events\CreateUserEvent;

class SendEmailNewUserAction
{
    public function handle($request): void
    {
        event(new CreateUserEvent($request));
    }
}
