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
        $this->assertEquals(400, $response->status());
    }

    /**
     * @covers EmailController::send
     * The to email is invalid. Must return status 400
     */
    public function testMailSendInvalidEmail()
    {
        $errorMsg = '{"to.email":["The to.email must be a valid email address."]}';
        $payload = [
            "from" => [
                "email" => "test431@mail.bg",
                "name" => "Petar"
            ],
            "to" => [
                "email" => "invalid",
                "name" => "Petar"
            ],
            "subject" => "Test mail comming.",
            "text" => "My second email"
        ];

        $response = $this->call('POST', '/mails', $payload);
        $this->assertEquals(400, $response->status());
        $this->assertEquals($errorMsg, $response->content());
    }

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
