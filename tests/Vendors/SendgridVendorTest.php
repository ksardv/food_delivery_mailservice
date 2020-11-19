<?php

use Sendgrid;
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
        $sendgridVendor = new SendgridVendor(config('services.sendgrid'));
        $instanceType = $sendgridVendor->getClient();

        $this->assertInstanceOf(Sendgrid::class, $instanceType);
    }
}
