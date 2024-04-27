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
        // Register layouts namespace
        Blade::anonymousComponentPath(resource_path('layouts'), 'layouts');
        Blade::componentNamespace('App\\View\\Layouts', 'layouts');

        // Default pagination view
        Paginator::defaultView('components.pagination');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
