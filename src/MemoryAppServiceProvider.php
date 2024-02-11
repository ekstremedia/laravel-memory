<?php

namespace Ekstremedia\MemoryApp;

use Illuminate\Support\ServiceProvider;

class MemoryAppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        //        $this->loadViewsFrom(__DIR__ . '/views', 'memoryapp');
        $this->publishes([
            __DIR__.'/path/to/assets' => public_path('vendor/memoryapp'),
        ], 'public');
        // Bootstrapping code here, such as routes, views, migrations, etc.
        if (config('memory.modules.vehicle')) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations/vehicle');
            // Load routes, views, etc., related to the vehicle module
        }
        $this->publishes([
            __DIR__.'/config/memory.php' => config_path('memory.php'),
        ], 'config');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'memoryapp');

    }

    public function register()
    {
        // Register bindings, configurations, etc.
    }
}
