<?php

return [
    /** Project Configurations */
    'project_refid'                 => env('PROJECT_REFID', ''),


    /** Database Connection Configurations */
    'conn_jobposting_ip'                 => env('CONN_JOBPOSTING_IP', env('DB_HOST')),
    'conn_jobposting_pt'                 => env('CONN_JOBPOSTING_PT', env('DB_PORT')),
    'conn_jobposting_db'                 => env('CONN_JOBPOSTING_DB', env('DB_DATABASE')),
    'conn_jobposting_un'                 => env('CONN_JOBPOSTING_UN', env('DB_USERNAME')),
    'conn_jobposting_pw'                 => env('CONN_JOBPOSTING_PW', env('DB_PASSWORD')),

    /** Query parameters */
    'fetch_paginate_max'            => env('FETCH_PAGINATE_MAX', 25),
];
