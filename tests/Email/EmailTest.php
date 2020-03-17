<?php

use App\EmailVO\EmailVO;

class EmailTest extends TestCase
{
    /**
     * @return void
     */
    public function testSetTo(): void
    {
        $to = ["test@test.bg", "John Doe"];

        $mail = new EmailVO();
        $mail->setTo($to);
        $this->assertEquals($to, $mail->getTo());
    }

    public function testSetFrom(): void
    {
        $from = ["testfom@test.bg", "Jane Doe"];

        $mail = new EmailVO();
        $mail->setFrom($from);
        $this->assertEquals($from, $mail->getFrom());
    }

    public function testSetSubject(): void
    {
        $subject = ["New job offer at the food delivery"];

        $mail = new EmailVO();
        $mail->setSubject($subject);
        $this->assertEquals($subject, $mail->getSubject());
    }

    public function testSetContent(): void
    {
        $content = ["Hello we would like to offer you an amazing opportunity to join our company."];

        $mail = new EmailVO();
        $mail->setContent($content);
        $this->assertEquals($content, $mail->getContent());
    }
}
