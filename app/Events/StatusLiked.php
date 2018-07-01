<?php

namespace notify\Events;

// use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Broadcasting\PrivateChannel;
// use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StatusLiked implements ShouldBroadcast 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $username)
    {
        $this->username = $username;
        $this->message = "{$username} - {$message}";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastAs(){
        return 'my-notify'; 
        // You can define the EVENT associated to your Channel applied on BROADCASTON method below
        // BroadcastAs its not necessary at all. But to me, defining this "PAIRING" help me organize things
    }
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
        return 'status-liked';
    }
}
