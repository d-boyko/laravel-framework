<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UnknownPostUserIdEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $text;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userId, $text)
    {
        $this->userId = $userId;
        $this->text = $text;
    }

//
//    /**
//     * Get the channels the event should broadcast on.
//     *
//     * @return \Illuminate\Broadcasting\Channel|array
//     */
//    public function broadcastOn()
//    {
//        return new PrivateChannel('channel-name');
//    }
}
