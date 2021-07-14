<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => env('FB_KEY', '333562444171867'),    // Your Facebook Client ID
        'client_secret' => env('FB_SECRET', '9949af39987904c13ff723f4a604a2f4'),    // Your Facebook Client Secret
        'redirect' => env('FB_CALLBACK', 'http://localhost:8000/login/facebook/callback'),
    ],

    'google' => [
        'client_id' => env('G_KEY', '497104216791-js5v8ddid69o07p3gu6a964nv7cgg564.apps.googleusercontent.com'),    // Your Google Client ID
        'client_secret' => env('G_SECRET', 'JgCpy5TJMu-VQyReEZsE9a9Y'), // Your Google Client Secret
        'redirect' => env('G_CALLBACK', 'http://localhost:8000/login/google/callback'),
    ],

];
