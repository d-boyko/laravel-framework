<?php

namespace App\Listeners;

use App\Events\CreateUserEvent;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;

class NewUserEmailNotification
{
    /**
     * Handle the event.
     *
     * @param  CreateUserEvent  $event
     * @return void
     */
    public function handle(CreateUserEvent $event): void
    {
        Mail::to('boyko.d.a@yandex.ru')->send(new RegisterMail(
            $event->userInfo['name'],
            $event->userInfo['email'],
            $event->userInfo['password'],
        ));
    }
}
