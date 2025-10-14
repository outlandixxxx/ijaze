<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class TrackVisitors
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $user = $request->user();
        $today = now()->toDateString();

        $alreadyVisited = Visitor::whereDate('visited_date', $today)
            ->when($user, fn($q) => $q->where('user_id', $user->id))
            ->when(!$user, fn($q) => $q->where('ip_address', $ip))
            ->exists();

        if (! $alreadyVisited) {
            Visitor::create([
                'user_id' => $user?->id,
                'ip_address' => $ip,
                'user_agent' => $request->userAgent(),
                'visited_date' => $today,
            ]);
        }

        return $next($request);
    }
}
