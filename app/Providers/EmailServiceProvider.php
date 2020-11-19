<?php

namespace App\Providers;

use App\Gateways\MailGateway;
use App\Vendors\MailjetVendor;
use App\Vendors\SendgridVendor;
use App\Gateways\SendgridGatewayAdapter;
use App\Gateways\MailjetGatewayAdapter;
use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MailGateway::class, function ($app) {
            switch ($app->make('config')->get('services.mail-provider')) {
                case 'mailjet':
                    $vendor = new MailjetVendor(config('mail.mailjet'));
                    return new MailjetGatewayAdapter($vendor);
                case 'sendgrid':
                    $vendor = new SendgridVendor(config('mail.sendgrid'));
                    return new SendgridGatewayAdapter($vendor);
                default:
                    throw new \RuntimeException("Unknown Mail Gateway Service");
            }
        });
    }
}
