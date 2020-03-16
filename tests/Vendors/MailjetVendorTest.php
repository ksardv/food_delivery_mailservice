<?php

use Mailjet\Client;
use App\Vendors\MailjetVendor;

class MailjetVendorTest extends TestCase
{
    /**
     * Instance Type Return test
     *
     * @return void
     */
    public function testReturnInstanceType(): void
    {
        $configurationParams = config('services.mailjet');
        $mailjetVendor = new MailjetVendor($configurationParams);
        $instanceType = $mailjetVendor->getClient();

        $this->assertInstanceOf(Client::class, $instanceType);
    }
}
