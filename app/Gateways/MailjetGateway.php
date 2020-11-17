<?php

namespace App\Gateways;

use App\Vendors\MailjetVendor;
use \Mailjet\Resources;
use App\Email;

class MailjetGateway implements MailGateway
{
    private $vendor;

    public function __construct(MailjetVendor $vendor)
    {
        $this->vendor = $vendor->getClient();
    }

    /**
     * @param $email
     */
    public function send($email)
    {
        echo 'sending through mailjet';
        $data = json_decode($email, true);

            $body = [
                'Messages' => [
                [
                    'From' => [
                        'Email' => $data['from']['email'],
                        'Name' => $data['from']['name']
                    ],
                    'To' => [
                    [
                        'Email' => $data['to']['email'],
                        'Name' => $data['to']['name']
                    ]
                    ],
                    'Subject' => $data['subject'],
                ]
                ]
            ];

            if(isset($data['html'])){
                $body['Messages'][0]['HTMLPart'] = $data['html'];
            }

            if(isset($data['text'])){
                $body['Messages'][0]['TextPart'] = $data['text'];
            }

            try {
                $response = $this->vendor->post(Resources::$Email, ['body' => $body]);
                return $response->success();
            } catch (\Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
    }
}
