<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateUserEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $userInfo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userInfo)
    {
        $this->userInfo = $userInfo;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array

        public function broadcastOn()
        {
            return new PrivateChannel('channel-name');
        }
     */
}
