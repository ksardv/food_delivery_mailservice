<?php

namespace App\Listeners;

use App\Events\EmailCreated;
use App\Email;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendCreatedEmailListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\EmailCreated  $event
     * @return void
     */
    public function handle(EmailCreated $event)
    {
        //uncomment the below line to test the job taking 10 seconds to be finished
        //sleep(10);
        $event->email->status = Email::EMAIL_PROC_STATUS;
        $event->email->save();
        Log::info('Email is being processed');
    }
}
