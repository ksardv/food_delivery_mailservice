<?php

namespace App\Vendors;

use \Sendgrid;

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
        $this->client = new Sendgrid(
            $configurationParams['key'],
        );
    }

    /**
     * Get Sendgrid client connection.
     *
     * @return Sendgrid
     */
    public function getClient(): Sendgrid
    {
        return $this->client;
    }
}
