<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $parameters;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->from('boyko.d.a@yandex.ru', 'INFO: New User')
            ->view('email.update-user-email')
            ->with($this->parameters);
    }
}