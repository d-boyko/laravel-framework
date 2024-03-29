<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateUserEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userInfo)
    {
        $this->user = $userInfo;
    }
}
