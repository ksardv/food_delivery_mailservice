<?php

namespace App\Publisher;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use App\Email;
use Illuminate\Support\Facades\Log;

class Publisher
{
    private $channel;
    private $connection;

    /**
     * @param Email $email
     */
    public function publish(Email $email)
    {
        Log::channel('publisher')->info('Email is published');
dd('here');
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare('email_queue', false, true, false, false);

        if (empty($email)) {
            $data = "No email....";
        }
        $msg = new AMQPMessage(
            $data,
            array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
        );

        $channel->basic_publish($msg, '', 'email_queue');

        echo ' [x] Sent ', $data, "\n";
    }

    public function close()
    {
        $this->channel->close();
        $this->connection->close();
    }
}

