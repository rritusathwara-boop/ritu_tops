<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
   protected function redirectTo($request)
{
    if ($request->expectsJson()) {
        return null;
    }

    if ($request->routeIs('wishlist.add') || $request->routeIs('wishlist.remove')) {
        return route('login') . '?wishlist_error=Please login to use your wishlist.';
    }

    return route('login');
}
}
