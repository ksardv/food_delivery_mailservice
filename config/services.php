<?php
/**
 * THIRD PARTY SERIVCE PROVIDERS
 */

return [

    'mailjet' => [
        'key' => env('MAILJET_APIKEY'),
        'secret' => env('MAILJET_APISECRET'),
    ],

    'sendgrid' => [
        'key' => env('SENDGRID_API_KEY'),
    ]
];
