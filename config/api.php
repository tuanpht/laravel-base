<?php

return [
    'pagination' => [
        'per_page' => 5,
        'max_per_page' => 1000,
    ],
    'code' => [
        'common' => [
            'unknown_error' => 500,
            'validate_failed' => 600,
        ],
        'user' => [
            'email_exists' => 701,
            'invalid_credentials' => 702,
            'user_not_found' => 706,
        ],
    ]
];
