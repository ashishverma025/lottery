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
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],
    'google' => [
        'client_id'     => '220173305017-1qg0itvvhdlghvhifhjj8pr465ogavns.apps.googleusercontent.com',
        'client_secret' => 'ow7JBX3sDPfu_nuteTCPksFN',
        'redirect'      => 'https://tutify.com.sg/google-callback'
    ],
    
    // 'google' => [
    //     'client_id'     => '451787054448-i4a3k3l1fupi671juqbqllojjmgk7fms.apps.googleusercontent.com',
    //     'client_secret' => 'bJ75KrgERfu48bvPRKjIztU8',
    //     'redirect'      => 'http://tutify.com.sg/google-callback'
    // ],

    'facebook' => [
        'client_id' => '2876274099085040',
        'client_secret' => 'c53fd71b37dca5115bb3d94cf89d0f3e',
        'redirect' => 'https://tutify.com.sg/facebook-callback',
    ],

];
