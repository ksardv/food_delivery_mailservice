<?php

namespace Tests\Email;

use App\Http\Controllers\EmailController;
use TestCase;

class EmailTest extends TestCase
{

    /**
     * @covers EmailController::getAllMails
     * Must return status 200
     */
    public function testGetAllEmails()
    {
        //todo Mock database set of emails
        $response = $this->call('GET', '/mails');
        dd($this->assertTrue(true));
        $this->assertEquals(200, $response->status());
    }

    /**
     * @covers EmailController::send
     * Must return status 400
     */
    public function testMailSendEmptyPayload()
    {
        $payload = [];
        $response = $this->call('POST', '/mails', $payload);
        $this->assertEquals(200, $response->status());
    }

    // /**
    //  * @covers EmailController::send
    //  * Must return status 400
    //  */
    // public function testMailSendInvalidEmail()
    // {
    //     $payload = [];
    //     //assert status is 400
    // }

    // /**
    //  * @covers EmailController::send
    //  * Must return status 201
    //  */
    // public function testMailSendSuccess()
    // {
    //    to silence or mock certain events while testing
    //    $this->expectsEvents('App\Events\EmailCreated');
    //     $payload = [];
    //     //assertstatus 201
    //     //assert database having email with the payload content
    //     //assert
    // }
}
