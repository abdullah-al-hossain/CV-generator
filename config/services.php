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
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => 'http://localhost:8000/facebook/callback',
    ],
    'google' => [
        'client_id' => '604052154755-jik4g60g3pc1drpn9kqd0ug3oh6g7nvo.apps.googleusercontent.com',
        'client_secret' => 'p7g-CozMS5vMcJj0-uZlD4_B',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'linkedin' => [
        'client_id' => '8615p43ga4r5f6',
        'client_secret' => 'RYCjcjLzAqBeSE5h',
        'redirect' => 'http://localhost:8000/callback/linkedin',
      ],

];
