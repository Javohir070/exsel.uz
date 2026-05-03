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

    'telegram' => [
        'bot_token' => env('TELEGRAM_BOT_TOKEN'),
        'chat_id' => env('TELEGRAM_CHAT_ID'),
    ],

    /*
    | Ilmiy ID API (Science ID foydalanuvchilari)
    | ILMIY_ID_API_USERNAME, ILMIY_ID_API_PASSWORD — majburiy
    | ILMIY_ID_API_VERIFY_SSL=false — mavjud muhit bilan mos (sertifikat tekshiruvi)
    */
    'ilmiy_id' => [
        'url' => env('ILMIY_ID_API_URL', 'https://api-id.ilmiy.uz'),
        'username' => env('ILMIY_ID_API_USERNAME'),
        'password' => env('ILMIY_ID_API_PASSWORD'),
        'verify_ssl' => env('ILMIY_ID_API_VERIFY_SSL', false),
    ],

];
