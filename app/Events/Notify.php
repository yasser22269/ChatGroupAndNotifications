<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Notify implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $username;
    public $message;
    public $date;
    public function __construct($username)
    {
        $this->username = $username;
        $this->date = date('Y-m-d H:i:s', strtotime(Now()));
        $this->message  = "{$username} liked your status";
    }

    public function broadcastOn()
    {
        return ['notification-send'];
    }

}
