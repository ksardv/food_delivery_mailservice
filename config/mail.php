<?php
/**
 * THIRD PARTY MAIL SERIVCE PROVIDERS
 */

return [

    // To add a new mail provider add it in the mail-provider config

    'mailjet' => [
        'key' => env('MAILJET_APIKEY'),
        'secret' => env('MAILJET_APISECRET'),
    ],

    'sendgrid' => [
        'key' => env('SENDGRID_API_KEY'),
    ]
];
