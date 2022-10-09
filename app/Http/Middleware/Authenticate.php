<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            if ($request->routeIs('admin.*')) {
                return route('admin.login');
            }
            if ($request->routeIs('teacher.*')) {
                return route('teacher.login');
            }
            if ($request->routeIs('student.*')) {
                return route('student.login');
            }
            if ($request->routeIs('parent.*')) {
                return route('parent.login');
            }

            return route('home');
        }
    }
}
