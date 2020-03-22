<?php

use App\Email;

class EmailTest extends TestCase
{
    /**
     * @return void
     */
    public function testSetTo(): void
    {
        $to = ["test@test.bg", "John Doe"];

        $mail = new Email();
        $mail->to = serialize($to);
        $this->assertEquals(serialize($to), $mail->to);
    }

    public function testSetFrom(): void
    {
        $from = ["testfom@test.bg", "Jane Doe"];

        $mail = new Email();
        $mail->from = serialize($from);
        $this->assertEquals(serialize($from), $mail->from);
    }

    public function testSetSubject(): void
    {
        $subject = ["New job offer at the food delivery"];

        $mail = new Email();
        $mail->subject = $subject;
        $this->assertEquals($subject, $mail->subject);
    }

    public function testSetContent(): void
    {
        $content = ["Hello we would like to offer you an amazing opportunity to join our company."];

        $mail = new Email();
        $mail->content = $content;
        $this->assertEquals($content, $mail->content);
    }
}
