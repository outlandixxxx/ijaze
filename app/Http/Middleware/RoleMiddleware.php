<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            abort(403, 'Unauthorized access.');
        }

        // Get user's role
        $userRole = auth()->user()->role;

        // Check if user has one of the allowed roles
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // User doesn't have required role
        abort(403, 'Unauthorized access.');
    }
}

