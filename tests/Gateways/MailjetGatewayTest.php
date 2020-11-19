<?php

use App\Gateways\MailjetGatewayAdapter;
use App\Vendors\MailjetVendor;


class MailjetGatewayTest extends TestCase
{
    private $gateway;

    public function setUp(): void
    {
        parent::setUp();

        $mailjetVendor = new MailjetVendor(config('mail.mailjet'));
        $this->gateway = new MailjetGatewayAdapter($mailjetVendor);
    }

    /**
     * Instance Type Return test
     *
     * @return void
     */
    public function testInstanceType(): void
    {
        $this->assertInstanceOf(MailjetGatewayAdapter::class, $this->gateway);
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
