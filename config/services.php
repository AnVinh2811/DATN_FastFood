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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '488946462328001',  //client face của bạn
        'client_secret' => '9f38f1b61101f507170877c22cc20a1b',  //client app service face của bạn
        'redirect' => 'https://trasua.net/customer/facebook/callback' //callback trả về
    ],
    'google' => [
        'client_id' => '1049828391714-0d1ghm5n8otejt75a4iejb88io2k6bah.apps.googleusercontent.com',
        'client_secret' => '5jttB8rDD2fEdt0iIWP7cq9r',
        'redirect' => 'http://trasua.net/google/callback'
    ],

];
