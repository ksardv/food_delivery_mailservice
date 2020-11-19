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
        $mailjetVendor = new MailjetVendor(config('mail.mailjet'));
        $instanceType = $mailjetVendor->getClient();

        $this->assertInstanceOf(Client::class, $instanceType);
    }
}
