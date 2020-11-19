<?php

use SendGrid;
use App\Vendors\SendgridVendor;

class SendgridVendorTest extends TestCase
{
    /**
     * Instance Type Return test
     *
     * @return void
     */
    public function testReturnInstanceType(): void
    {
        $sendgridVendor = new SendgridVendor(config('mail.sendgrid'));
        $instanceType = $sendgridVendor->getClient();

        $this->assertInstanceOf(SendGrid::class, $instanceType);
    }
}
