<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContentSecurityPolicy
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Skip CSP in local development
        if (config('app.env') === 'local') {
            return $response;
        }

        // Production CSP
        if ($request->is('admin/*') || $request->is('dashboard/*')) {
            // More relaxed CSP for admin area
            $csp = "default-src 'self'; script-src 'self' 'unsafe-inline' https://www.google.com https://www.gstatic.com; style-src 'self' 'unsafe-inline'; frame-src https://www.google.com https://www.youtube.com; img-src 'self' data: https:;";
        } else {
            // Strict CSP for public pages
            $csp = "default-src 'self'; script-src 'self' https://www.google.com https://www.gstatic.com; style-src 'self' 'unsafe-inline'; frame-src https://www.google.com https://www.youtube.com; img-src 'self' data: https:;";
        }

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
