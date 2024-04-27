<?php

if (! function_exists('route_allowed')) {
    /**
     * Check if the gate allows the given permission.
     */
    function route_allowed(string $route): bool
    {
        $key = 'permission.' . auth()->id() . '.' . $route;

        return cache()->rememberForever($key, function () use ($route) {
            return \Spatie\Permission\Models\Permission::whereName($route)->doesntExist() ||
                \Illuminate\Support\Facades\Gate::allows($route);
        });
    }
}
