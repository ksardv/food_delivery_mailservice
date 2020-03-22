<?php

namespace App\Gateways;
use App\Vendors\SendgridVendor;
use SendGrid\Mail\Mail;
use App\Email\Email;

class SendgridGateway implements MailGateway
{
    private $vendor;

    public function __construct(SendgridVendor $vendor)
    {
        $this->vendor = $vendor->getClient();
    }

    /**
     * @param $email
     *
     */
    public function send($email)
    {
        var_dump('HERE IS SENDGRID.......'.$email);
        $data = json_decode($email, true);

        $mail = new Mail();
        $mail->setFrom($data['from']['email'], $data['from']['name']);
        $mail->setSubject($data['subject']);
        $mail->addTo($data['to']['email'], $data['to']['name']);
        if(isset($data['text'])){
            $mail->addContent("text/plain", $data['text']);
        }
        if(isset($data['html'])){
            $mail->addContent(
                "text/html", $data['html']
            );
        }

        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($mail);
            var_dump('HERE IS SG response.....'.$response->statusCode());
            return $response->statusCode();
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }

    }
}
