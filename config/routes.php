<?php

return [
    'groups' => [
        'web' => [
            'middleware' => 'web',
            'prefix' => '',
        ],
        'api' => [
            'middleware' => 'api',
            'prefix' => 'api',
        ],
    ],

    'web' => [
        App\Http\Routes\DefaultRoute::class,
        App\Http\Controllers\DashboardController::class,
        App\Http\Controllers\TaskController::class
        /** @inject web **/
    ],
    'api' => [
        /** @inject api **/
    ],
];
