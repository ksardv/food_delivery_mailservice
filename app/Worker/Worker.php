<?php

namespace App\Worker;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class Worker
{
    public function consume()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare('email_queue', false, true, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
            sleep(substr_count($msg->body, '.'));
            echo " [x] Done\n";
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        $channel->basic_qos(null, 1, null);
        $channel->basic_consume('email_queue', '', false, false, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}