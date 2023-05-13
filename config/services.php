<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
        'client_id' => 'bc3232ad4dce53e17122',
        'client_secret' => '8d4a05e6898141eb68cec07813869e84a3eebca9',
        'redirect' => 'https://developers.productdemourl.com/socializer/public/auth/callback',
    ],

    'google' => [
        'client_id' => '746445492596-dj7v1i6lvi68mogvcg5dj1hqqtespqb2.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://developers.productdemourl.com/socializer/public/auth/callback/google',
    ]
];
