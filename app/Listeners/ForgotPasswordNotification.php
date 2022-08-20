<?php

namespace App\Listeners;

use App\Events\ForgotPasswordEvent;
use App\Mail\ForgotUserPasswordMail;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordNotification
{
    /**
     * Handle the event.
     *
     * @param ForgotPasswordEvent $event
     * @return void
     */
    public function handle(ForgotPasswordEvent $event): void
    {
        Mail::to('boyko.d.a@yandex.ru')->send(new ForgotUserPasswordMail(
            $event->userInfo['email'],
            $event->userInfo['password'],
        ));
    }
}
