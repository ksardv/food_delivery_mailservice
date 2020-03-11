<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Email;
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

    /**
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function send(Request $request)
    {

        //SENDgrid
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("test@example.com", "Example User");
        $email->setSubject("Sending with SendGrid is Fun");
        $email->addTo("test@example.com", "Example User");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );

        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }

        //MAILJET working implementation
        // $mj = new \Mailjet\Client('f39e2037a2d1d66a674842b06b430a2a','534439e11c0bba3a22647945f015f217',true,['version' => 'v3.1']);
        // $body = [
        //     'Messages' => [
        //     [
        //         'From' => [
        //         'Email' => "petar.ivanov2001@mail.bg",
        //         'Name' => "Petar"
        //         ],
        //         'To' => [
        //         [
        //             'Email' => "petar.ivanov2001@mail.bg",
        //             'Name' => "Petar"
        //         ]
        //         ],
        //         'Subject' => "Greetings from Mailjet.",
        //         'TextPart' => "My first Mailjet email",
        //         'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
        //         'CustomID' => "AppGettingStartedTest"
        //     ]
        //     ]
        // ];
        // $response = $mj->post(Resources::$Email, ['body' => $body]);
        // $response->success() && var_dump($response->getData());

    }
}
