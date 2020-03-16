<?php

namespace App\Gateways;

use App\Email\Email;

interface MailGateway
{
    /**
     * @param Email $email
     */
    public function send(Email $email);
}
