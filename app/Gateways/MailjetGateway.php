<?php

namespace App\Gateways;

use App\Vendors\MailjetVendor;
use \Mailjet\Resources;
use App\Email\Email;

class MailjetGateway implements MailGateway
{
    private $vendor;

    public function __construct(MailjetVendor $vendor)
    {
        $this->vendor = $vendor->getClient();
    }

    /**
     * @param Email $email
     */
    public function send(Email $email = null)
    {
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

            try {
                $response = $this->vendor->post(Resources::$Email, ['body' => $body]);
                return $response->success();
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
    }
}
