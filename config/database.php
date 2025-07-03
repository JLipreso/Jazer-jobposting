<?php

return [
    'database_connection' => [
        'driver'        => 'mysql',
        'host'          => env('CONN_JOBPOSTING_IP', config('jobpostingconfig.conn_jobposting_ip')),
        'port'          => env('CONN_JOBPOSTING_PT', config('jobpostingconfig.conn_jobposting_pt')),
        'database'      => env('CONN_JOBPOSTING_DB', config('jobpostingconfig.conn_jobposting_db')),
        'username'      => env('CONN_JOBPOSTING_UN', config('jobpostingconfig.conn_jobposting_un')),
        'password'      => env('CONN_JOBPOSTING_PW', config('jobpostingconfig.conn_jobposting_pw')),
        'charset'       => 'utf8mb4',
        'collation'     => 'utf8mb4_unicode_ci',
        'prefix'        => ''
    ],
];