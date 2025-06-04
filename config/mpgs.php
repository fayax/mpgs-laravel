<?php

return [
    'api_url' => env('MPGS_API_URL', 'https://ap-gateway.mastercard.com/api/rest/version/100/'),
    'merchant_id' => env('MPGS_MERCHANT_ID'),
    'api_username' => env('MPGS_API_USERNAME'),
    'api_password' => env('MPGS_API_PASSWORD'),

    // Additional configuration options can be added here
];