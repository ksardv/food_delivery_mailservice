<?php

namespace App\Events;

use App\Email;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;

class EmailCreated extends Event
{
    use InteractsWithSockets, SerializesModels;

    public $email;

    /**
     * Create a new event instance.
     *
     * @param  \App\Email  $email
     * @return void
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }
}
