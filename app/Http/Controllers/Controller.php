<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Redirect with a successfull creation message.
     */
    public function created(string $resource, ?string $route = null, mixed $parameters = [])
    {
        $message = __(':resource has been created.', ['resource' => $resource]);

        if ($route === null) {
            return back()->with('success', $message);
        }

        return redirect()->route($route, $parameters)->with('success', $message);
    }

    /**
     * Redirect with a successfull update message.
     */
    public function updated(string $resource, ?string $route = null, mixed $parameters = [])
    {
        $message = __(':resource has been updated.', ['resource' => $resource]);

        if ($route === null) {
            return back()->with('success', $message);
        }

        return redirect()->route($route, $parameters)->with('success', $message);
    }

    /**
     * Redirect with a successfull deletion message.
     */
    public function deleted(string $resource, ?string $route = null, mixed $parameters = [])
    {
        $message = __(':resource has been deleted.', ['resource' => $resource]);

        if ($route === null) {
            return back()->with('success', $message);
        }

        return redirect()->route($route, $parameters)->with('success', $message);
    }

    /**
     * Redirect with a success message.
     */
    public function success(string $message, ?string $route = null, mixed $parameters = [])
    {
        if ($route === null) {
            return back()->with('success', $message);
        }

        return redirect()->route($route, $parameters)->with('success', $message);
    }

    /**
     * Redirect with an error message.
     */
    public function error(string $message, ?string $route = null, mixed $parameters = [])
    {
        if ($route === null) {
            return back()->with('error', $message);
        }

        return redirect()->route($route, $parameters)->with('error', $message);
    }

    /**
     * Redirect with a warning message.
     */
    public function warning(string $message, ?string $route = null, mixed $parameters = [])
    {
        if ($route === null) {
            return back()->with('warning', $message);
        }

        return redirect()->route($route, $parameters)->with('warning', $message);
    }

    /**
     * Redirect with an info message.
     */
    public function info(string $message, ?string $route = null, mixed $parameters = [])
    {
        if ($route === null) {
            return back()->with('info', $message);
        }

        return redirect()->route($route, $parameters)->with('info', $message);
    }
}
