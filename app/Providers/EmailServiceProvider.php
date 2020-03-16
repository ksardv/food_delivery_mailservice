<?php

namespace App\Providers;

use App\Vendors\MailjetVendor;
use App\Vendors\SendgridVendor;
use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MailjetVendor::class, function ($app) {
            $configParams = $app->make('config')->get('services.mailjet', []);
            return new MailjetVendor($configParams);
        });

        $this->app->singleton(SendgridVendor::class, function ($app) {
            $configParams = $app->make('config')->get('services.sendgrid', []);
            return new SendgridVendor($configParams);
        });
    }
}
