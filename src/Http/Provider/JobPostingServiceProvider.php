<?php

namespace Jazer\JobPosting\Http\Provider;

use Illuminate\Support\ServiceProvider;

class JobPostingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../config/database.php', 'jobposting'  
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../../config/config.php' => config_path('jobpostingconfig.php')
        ], 'jobpostingconfig-config');
        
        $this->loadRoutesFrom( __DIR__ . '/../../../routes/api.php');

        config(['database.connections.conn_jobposting' => config('jobposting.database_connection')]);
    }
}
