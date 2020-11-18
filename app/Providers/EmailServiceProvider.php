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
            return new MailjetVendor($app['config']['services.mailjet']);
        });

        $this->app->singleton(SendgridVendor::class, function ($app) {
            return new SendgridVendor($app['config']['services.sendgrid']);
        });
    }
}
