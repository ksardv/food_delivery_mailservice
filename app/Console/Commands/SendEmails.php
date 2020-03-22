<?php

namespace App\Console\Commands;

use App\Email;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send test preset e-mails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = [
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
            ];

            $formattedData = json_encode($data);
    }
}
