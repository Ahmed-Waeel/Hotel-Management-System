<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::setPaginationView('components.pagination');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
