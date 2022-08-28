<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UnknownUserIdMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $parameters;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userId, $text)
    {
        $this->parameters['userId'] = $userId;
        $this->parameters['text'] = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->from('boyko.d.a@yandex.ru', 'ERROR: Bad user_id by creating a new post')
            ->view('email.unknown-user-id')
            ->with($this->parameters);
    }
}
