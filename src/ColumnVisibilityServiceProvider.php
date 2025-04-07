<?php

namespace MohasinDev\ColumnVisibility;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ColumnVisibilityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'column-visibility');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../public/js/columnVisibility.js' => public_path('vendor/column-visibility/columnVisibility.js'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../resources/views/components' => resource_path('views/vendor/column-visibility/components'),
        ], 'views');

        Blade::componentNamespace('MohasinDev\\ColumnVisibility\\View\\Components', 'column-visibility');
    }

    public function register() {}
}
