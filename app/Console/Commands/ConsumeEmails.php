<?php

namespace App\Console\Commands;

use App\Email;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Worker\Worker;

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
        $consume = new Worker();
        $consume->consume();
    }
}
