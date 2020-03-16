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
     * @param Email $email
     *
     */
    public function send(Email $email = null)
    {
        $mail = new Mail();
        $mail->setFrom("test@example.com", "Example User");
        $mail->setSubject("Sending with SendGrid is Fun");
        $mail->addTo("test@example.com", "Example User");
        $mail->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $mail->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );

        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($mail);
            return $response->statusCode();
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }

    }
}
