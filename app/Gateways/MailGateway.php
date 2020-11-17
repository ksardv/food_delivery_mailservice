<?php

namespace App\Gateways;

use App\Email;

interface MailGateway
{
    /**
     * @param Email $email
     */
    public function send(Email $email);
}
