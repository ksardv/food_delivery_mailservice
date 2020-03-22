<?php

namespace App\Publisher;
use App\Email;

interface Publisher
{
    public function publish(Email $email);
}
