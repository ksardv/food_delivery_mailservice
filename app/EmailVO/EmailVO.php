<?php

namespace App\EmailVO;

final class EmailVO
{
    /**
     * Email is a Value Object
     */
    private $from;
    private $to;
    private $subject;
    private $content;

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
}
