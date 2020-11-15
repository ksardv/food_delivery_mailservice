<?php

use App\Email;
use App\Http\Controllers\EmailController;

class EmailTest extends TestCase
{

    /**
     * @covers EmailController::getAllMails
     * Must return status 200
     */
    public function testGetAllEmails()
    {
        //todo Mock database set of emails
    }

    /**
     * @covers EmailController::send
     * Must return status 400
     */
    public function testMailSendEmptyPayload()
    {
        $payload = [];
        //assert status is 400
    }

    /**
     * @covers EmailController::send
     * Must return status 400
     */
    public function testMailSendInvalidEmail()
    {
        $payload = [];
        //assert status is 400
    }

    /**
     * @covers EmailController::send
     * Must return status 201
     */
    public function testMailSendSuccess()
    {
        $payload = [];
        //assertstatus 201
        //assert database having email with the payload content
        //assert
    }
}
