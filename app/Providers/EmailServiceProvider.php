<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    public function register()
    {
        // $this->app->singleton(MailjetConnector::class, function ($app) {
        //     $config = $app->make('config')->get('services.mailjet', []);
        //     return new MailjetConnector($config);
        // });

        // $this->app->singleton(SendgridConnector::class, function ($app) {
        //     $config = $app->make('config')->get('services.sendgrid', []);
        //     return new SendgridConnector($config);
        // });
    }
}
