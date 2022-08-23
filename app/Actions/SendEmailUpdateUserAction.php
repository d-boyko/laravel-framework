<?php

namespace App\Actions;

use App\Contracts\UpdateUserContract;
use App\Events\UpdateUserEvent;

class SendEmailUpdateUserAction implements UpdateUserContract
{
    public function handle($data)
    {
        event(new UpdateUserEvent($data->all()));
    }
}
