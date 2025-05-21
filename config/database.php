<?php

return [
    'database_connection' => [
        'driver'        => 'mysql',
        'host'          => env('CONN_JOBPOSTING_IP', config('jobpostingconfig.conn_users_ip')),
        'port'          => env('CONN_JOBPOSTING_PT', config('jobpostingconfig.conn_users_pt')),
        'database'      => env('CONN_JOBPOSTING_DB', config('jobpostingconfig.conn_users_db')),
        'username'      => env('CONN_JOBPOSTING_UN', config('jobpostingconfig.conn_users_un')),
        'password'      => env('CONN_JOBPOSTING_PW', config('jobpostingconfig.conn_users_pw')),
        'charset'       => 'utf8mb4',
        'collation'     => 'utf8mb4_unicode_ci',
        'prefix'        => ''
    ],
];