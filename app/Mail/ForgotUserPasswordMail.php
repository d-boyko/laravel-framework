<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotUserPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $password)
    {
        $this->data['email'] = $email;
        $this->data['password'] = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->from('boyko.d.a@yandex.ru', 'INFO: User has a new password')
            ->view('email.forgot-password-email')
            ->with($this->data);
    }
}
