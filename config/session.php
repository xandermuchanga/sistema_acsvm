<?php

return [
    'driver' => env('SESSION_DRIVER', 'file'),
    'lifetime' => (int) env('SESSION_LIFETIME', 120),
    'files' => storage_path('framework/sessions'),
    'cookie' => env('SESSION_COOKIE', 'sigis_session'),
];
