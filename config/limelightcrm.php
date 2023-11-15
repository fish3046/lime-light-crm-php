<?php

/**
 * For use with Laravel service provider with the Sticky.io CRM package
 */

return [
    'base_url' => env('LIMELIGHT_BASE_URL'),
    'username' => env('LIMELIGHT_USERNAME'),
    'password' => env('LIMELIGHT_PASSWORD'),

    'retry' => [
        // https://github.com/caseyamcl/guzzle_retry_middleware#options
        'lib-config' => [
            // Suggested library MUST BE INSTALLED if this is enabled.
            'retry_enabled'            => env('LIMELIGHT_RETRY_ENABLED', false),
            'max_retry_attempts'       => env('LIMELIGHT_RETRY_MAX', 3),
            'retry_on_status'          => [429, 500, 502, 503, 504],

            // Value to multiply the number of requests by if RetryAfter not supplied.
            // See https://github.com/caseyamcl/guzzle_retry_middleware#setting-default-retry-delay
            'default_retry_multiplier' => env('LIMELIGHT_RETRY_MULTIPLIER', 1),

            // https://github.com/caseyamcl/guzzle_retry_middleware#adding-a-custom-retry-header-to-http-responses
            'expose_retry_header'      => true,
        ],

        // Should we log a debug message every time we retry
        'log-retries' => env('LIMELIGHT_RETRY_LOG', true),
    ],
];
