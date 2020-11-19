<?php

use App\Gateways\SendgridGatewayAdapter;
use App\Vendors\SendgridVendor;


class SendgridGatewayTest extends TestCase
{
    private $gateway;

    public function setUp(): void
    {
        parent::setUp();

        $sendgridVendor = new SendgridVendor(config('mail.sendgrid'));
        $this->gateway = new SendgridGatewayAdapter($sendgridVendor);
    }

    /**
     * Instance Type Return test
     *
     * @return void
     */
    public function testInstanceType(): void
    {
        $this->assertInstanceOf(SendgridGatewayAdapter::class, $this->gateway);
    }

    /**
     * @return void
     */
    // public function testSend(): void
    // {
    //     $successStatusCode = 202;
    //     $response = $this->gateway->send();

    //     $this->assertEquals($response, $successStatusCode);
    // }
}
