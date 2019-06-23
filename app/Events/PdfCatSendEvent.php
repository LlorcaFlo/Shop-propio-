<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PdfCatSendEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $cart;

    public function __construct($user, $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
