<?php

namespace App\Listeners;

use App\Events\UpdateUserEvent;
use App\Mail\UpdateUserMail;
use Illuminate\Support\Facades\Mail;

class UpdateUserInfoNotification
{
    /**
     * Handle the event.
     *
     * @param UpdateUserEvent $event
     * @return void
     */
    public function handle(UpdateUserEvent $event): void
    {
        Mail::to('boyko.d.a@yandex.ru')->send(new UpdateUserMail(
            $event->user,
        ));
    }
}
