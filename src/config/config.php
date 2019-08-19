<?php

return [
    'username' => env('TRUSTOCEAN_USERNAME'),
    'password' => env('TRUSTOCEAN_PASSWORD'),
    'origin' => env('TRUSTOCEAN_ORIGIN'),
    'privateKey' => env('TRUSTOCEAN_PUSH_KEY'), // PUSH的解密 KEY
];
