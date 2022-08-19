<?php

namespace App\Listeners;

use App\Events\UserRegistrationEvent;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NewUserEmailNotification
{
    /**
     * Handle the event.
     *
     * @param  UserRegistrationEvent  $event
     * @return void
     */
    public function handle(UserRegistrationEvent $event): void
    {
        Log::debug('new user has been registered');
        Mail::to('boyko.d.a@yandex.ru')->send(new RegisterMail(
            $event->userInfo['name'],
            $event->userInfo['email'],
            $event->userInfo['password'],
        ));
    }
}
