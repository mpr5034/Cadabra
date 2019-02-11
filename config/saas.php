<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SAAS Configuration
    |--------------------------------------------------------------------------
    */

    'demo' => env('DEMO_MODE', false),
    'bap_saas_secret' => env('BAP_SAAS_KEY', ''),
    'api_url' => env('APPLICATION_REST_API', null),
    'application_url' => env('APPLICATION_URL'),

    'languages' => [
        'en' => 'English',
    ],

    'stripe' => [
        'name' => env('SAAS_PAYMENT_NAME', 'BAP SAAS KIT'),
        'description' => env('SAAS_PAYMENT_DESC', 'Membership'),
        'currency' => env('SAASK_PAYMENT_CURRENCY', 'USD'),
    ],

    'social' => [
        'facebook' => env('SOCIAL_FACEBOOK', 'https://www.facebook.com/laravelbap/'),
        'instagram' => env('SOCIAL_INSTAGRAM', 'https://www.instagram.com/naruto/'),
        'twitter' => env('SOCIAL_TWITTER', 'https://twitter.com/laravel_bap'),
        'github' => env('SOCIAL_GITHUB', 'https://github.com/laravelbap'),

    ],

    'footer' => [
        'company' => 'Laravel BAP',
        'company_link' => 'https://laravel-bap.com',
        'vectors' => true
    ]
];
