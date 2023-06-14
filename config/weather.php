<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Api Key
    |--------------------------------------------------------------------------
    |
    | Here you may specify your own api key to be used for the current Laravel-Weather package.
    */

    'api_key' => env('WEATHER_API_KEY', '52bc4de23bad4639861233754230306'),

    /*
    |--------------------------------------------------------------------------
    | Default Base Url
    |--------------------------------------------------------------------------
    |
    | Here you have access to the api base url used within the current Laravel-Weather package.
    */

    'base_url' => env('WEATHER_API_BASE_URL', 'https://api.weatherapi.com/v1')
];
