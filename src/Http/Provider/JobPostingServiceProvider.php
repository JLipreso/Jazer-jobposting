<?php

namespace Jazer\JobPosting\Http\Provider;

use Illuminate\Support\ServiceProvider;

class JobPostingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../config/database.php', 'jtjobpostingconfig'  
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../../config/config.php' => config_path('jtjobpostingconfig.php')
        ], 'jtjobpostingconfig-config');
        
        $this->loadRoutesFrom( __DIR__ . '/../../../routes/api.php');

        config(['database.connections.conn_jobposting' => config('jtjobpostingconfig.database_connection')]);
    }
}
