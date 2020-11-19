<?php

namespace Tests\Email;

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Event;
use Laravel\Lumen\Testing\DatabaseMigrations;
use App\Events\EmailCreated;
use TestCase;

class EmailTest extends TestCase
{
    use DatabaseMigrations;
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

    /**
     * @covers EmailController::send
     * Must return status 201
     */
    public function testMailSendSuccess()
    {
        Event::fake();

        $payload = [
            "from" => [
                "email" => "test431@mail.bg",
                "name" => "Petar"
            ],
            "to" => [
                "email" => "validmail@test.bg",
                "name" => "Petar"
            ],
            "subject" => "Test mail coming.",
            "text" => "My second email"
        ];

        $response = $this->call('POST', '/mails', $payload);

        Event::assertDispatched(function (EmailCreated $event) use ($payload) {
            return $event->email->subject === $payload['subject'];
        });
        $this->assertEquals(201, $response->status());
        $this->seeInDatabase('emails', ['from' => 'test431@mail.bg']);
    }
}
