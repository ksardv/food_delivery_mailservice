<?php

namespace App\Http\Controllers;

use \Mailjet\Resources;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function send()
    {
        $mj = new \Mailjet\Client('f39e2037a2d1d66a674842b06b430a2a','534439e11c0bba3a22647945f015f217',true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
            [
                'From' => [
                'Email' => "petar.ivanov2001@mail.bg",
                'Name' => "Petar"
                ],
                'To' => [
                [
                    'Email' => "petar.ivanov2001@mail.bg",
                    'Name' => "Petar"
                ]
                ],
                'Subject' => "Greetings from Mailjet.",
                'TextPart' => "My first Mailjet email",
                'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
                'CustomID' => "AppGettingStartedTest"
            ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && var_dump($response->getData());

    }
}
