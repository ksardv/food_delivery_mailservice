<?php

use App\Gateways\MailjetGateway;
use App\Vendors\MailjetVendor;


class MailjetGatewayTest extends TestCase
{
    private $gateway;

    public function setUp(): void
    {
        parent::setUp();

        $mailjetVendor = new MailjetVendor(config('services.mailjet'));
        $this->gateway = new MailjetGateway($mailjetVendor);
    }

    /**
     * Instance Type Return test
     *
     * @return void
     */
    public function testInstanceType(): void
    {
        $this->assertInstanceOf(MailjetGateway::class, $this->gateway);
    }

    /**
     * @return void
     */
    // public function testSend(): void
    // {
    //     $mail = $this->gateway->send();

    //     $this->assertTrue($mail);
    // }
}
