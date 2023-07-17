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
    'google' => [
        'client_id' => '565611013730-i0p3fjuilr55egeg4bcehadnl1ik4lvl.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/google/callback'
    ],
    'vnpay' => [
        'vnp_TmnCode' => "ILBGPSFG", //Website ID in VNPAY System
        'vnp_HashSecret' => "PSCWGBREUIWXCBOKRSJCHPQSLJHSGITJ", //Secret key
        'vnp_Url' => "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html",
        'vnp_Returnurl' => "http://127.0.0.1:8000/thankyou",
    ]
];
