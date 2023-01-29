<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;
    public $email;

    public function __construct($username,$email)
    {
        $this->username=$username;
        $this->email=$email;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
