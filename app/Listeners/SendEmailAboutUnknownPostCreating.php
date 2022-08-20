<?php

namespace App\Listeners;

use App\Events\UnknownPostUserIdEvent;
use App\Mail\UnknownUserIdMail;
use Illuminate\Support\Facades\Mail;

class SendEmailAboutUnknownPostCreating
{
    /**
     * Handle the event.
     *
     * @param UnknownPostUserIdEvent $event
     * @return void
     */
    public function handle(UnknownPostUserIdEvent $event): void
    {
        Mail::to('boyko.d.a@yandex.ru')->send(new UnknownUserIdMail(
            $event->userId,
            $event->text,
        ));
    }
}
