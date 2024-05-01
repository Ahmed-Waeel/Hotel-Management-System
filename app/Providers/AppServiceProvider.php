<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register layouts namespace
        Blade::componentNamespace('App\\View\\Layouts', 'layouts');
        Blade::anonymousComponentPath(resource_path('views\layouts'), 'layouts');

        // Register components namespace
        Blade::componentNamespace('App\\View\\Components', 'components');
        Blade::anonymousComponentPath(resource_path('views\components'), 'components');

        // Default pagination view
        Paginator::defaultView('components.pagination');
    }
}
