<?php

use Mailjet\Client;
use App\Gateways\MailjetGateway;
use App\Vendors\MailjetVendor;
use Mailjet\Resources;

class MailjetGatewayTest extends TestCase
{
    private $gateway;

    public function setUp(): void
    {
        parent::setUp();

        $configurationParams = config('services.mailjet');
        $mailjetVendor = new MailjetVendor($configurationParams);

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
