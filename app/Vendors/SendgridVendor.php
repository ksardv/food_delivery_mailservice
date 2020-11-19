<?php

namespace App\Vendors;

use \SendGrid;

class SendgridVendor implements Vendor
{
    private $client;

    /**
     * create client connection
     *
     * @param array  $configurationParams
     */
    public function __construct(array $configurationParams)
    {
        $this->client = new SendGrid(
            $configurationParams['key'],
        );
    }

    /**
     * Get Sendgrid client connection.
     *
     * @return SendGrid
     */
    public function getClient(): SendGrid
    {
        return $this->client;
    }
}
