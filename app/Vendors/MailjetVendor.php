<?php

namespace App\Vendors;

use Mailjet\Client;

class MailjetVendor implements Vendor
{
    private $client;

    /**
     * create client connection
     *
     * @param array  $configurationParams
     */
    public function __construct(array $configurationParams)
    {
        $this->client = new Client(
            $configurationParams['key'],
            $configurationParams['secret'],
            true,
            ['version' => 'v3.1']
        );
    }

    /**
     * Get Mailjet client connection.
     *
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
