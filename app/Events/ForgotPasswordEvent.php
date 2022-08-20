<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $userInfo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $password)
    {
        $this->userInfo['email'] = $email;
        $this->userInfo['password'] = $password;
    }
}
