<?php

namespace App\Console\Commands;

use App\Email;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Worker\EmailWorker;
use App\Gateways\MailjetGateway;
use App\Vendors\MailjetVendor;
use App\Gateways\SendgridGateway;
use App\Vendors\SendgridVendor;

class ConsumeEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consume e-mails';

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
        $configMailjet = config('services.mailjet');
        $mailjetVendor = new MailjetVendor($configMailjet);
        $mailjetGateway = new MailjetGateway($mailjetVendor);

        $configSendgrid = config('services.sendgrid');
        $sendgridVendor = new SendgridVendor($configSendgrid);
        $sendgridGateway = new SendgridGateway($sendgridVendor);

        $mailgateways = [
            $mailjetGateway,
            $sendgridGateway
        ];

        $consume = new EmailWorker($mailgateways);
        $consume->consume();
    }
}
