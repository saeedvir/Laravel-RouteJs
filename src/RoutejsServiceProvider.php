<?php

namespace Saeedvir\RouteJs;

use Illuminate\Support\ServiceProvider;
use Saeedvir\RouteJs\Commands\RoutesJsCommand;

class RoutejsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../config/routejs.php', 'routejs');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
             __DIR__.'/../config/routejs.php' => config_path('routejs.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                RoutesJsCommand::class
            ]);
        }
    }
}
