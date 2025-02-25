<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class FriendRequestNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reveiver;
    public $sender;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $receiver , User $sender)
    {
        $this->reveiver = $receiver;
        $this->sender = $sender;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    public function broadcastWith(){
        return [
            'message' => "You have a new friend request from " . $this->sender->name,
            'sender' => $this->sender->only(['id', 'name', 'profile_photo']),
        ];
    }
}
