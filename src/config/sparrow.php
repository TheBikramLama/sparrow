<?php

return [
    // Your Sparrow SMS Access Token here.
    'access_token' => '',
    // Identity Provided by Sparrow SMS
    'from' => 'InfoSms',

    // Do not edit the values below here unless necessary.
    'api_endpoint' => 'http://api.sparrowsms.com/v2/',
    'methods' => [
        'send' => 'sms/',
        'credit' => 'credit/'
    ]
];
