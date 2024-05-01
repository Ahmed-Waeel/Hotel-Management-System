<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(function () {
        Route::middleware('website')->as('website.')->group(base_path('routes/website.php'));
        Route::middleware('dashboard')->as('dashboard.')->prefix('dashboard')->group(base_path('routes/dashboard.php'));

        // Add the `website` middleware to the fallback route
        Route::fallback(fn () => abort(404))->middleware('website');
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('website', [
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Session\Middleware\StartSession::class,
        ]);

        $middleware->appendToGroup('dashboard', [
            \App\Http\Middleware\Dashboard\RoutePermission::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        ]);

        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
