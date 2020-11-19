<?php

namespace App\Listeners;

use App\Events\EmailCreated;
use App\Email;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use App\Gateways\MailGateway;

class SendCreatedEmailListener implements ShouldQueue
{
    private $mailGateway;

    public function __construct(MailGateway $gateway)
    {
        $this->mailGateway = $gateway;
    }
    /**
     * Handle the event.
     *
     * @param  \App\Events\EmailCreated  $event
     * @return void
     */
    public function handle(EmailCreated $event)
    {
        Log::info('Email is being processed');
        $this->setMailStatus($event);
        $this->sendMail($event);
    }

    public function setMailStatus($event)
    {
        $event->email->status = Email::EMAIL_PROC_STATUS;
        $event->email->save();
    }

    // TODO - update the email status in the Db fromthe gateway response
    public function sendMail($event)
    {
        $this->mailGateway->send($event->email);
    }
}
