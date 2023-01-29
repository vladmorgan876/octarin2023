<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MyEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $username;
    public $email;

//    public function __construct(Order $order)
    public function __construct($some,$some2)
    {
//    $this->username=$order->username;
    $this->username=$some;
    $this->email=$some2;
    }
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
