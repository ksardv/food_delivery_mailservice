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
        $configurationParams = config('services.sendgrid');
        $sendgridVendor = new SendgridVendor($configurationParams);
        $instanceType = $sendgridVendor->getClient();

        $this->assertInstanceOf(Sendgrid::class, $instanceType);
    }
}
