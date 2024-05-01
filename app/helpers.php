<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

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

if (! function_exists('upload_file')) {
    /**
     * Upload file to path.
     */
    function upload_file(UploadedFile $file, string $path = ''): string
    {
        $path = 'uploads/' . $path;
        $directory = dirname(public_path($path));
        File::ensureDirectoryExists($directory, 0755, true);

        $extension = $file->getClientOriginalExtension();
        $originalName = basename($file->getClientOriginalName(), '.' . $extension);
        $filename = Str::slug($originalName) . '-' . Str::random(8) . '.' . $extension;

        $file->move($path, $filename);

        return URL::to($path . '/' . $filename);
    }
}
