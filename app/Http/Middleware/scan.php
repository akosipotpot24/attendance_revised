<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class scan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if (!auth()->check()) {
        return redirect('/');
}

        $user = auth()->user();

        // Allow only user_type 4 (Scanner) AND must be active
        if ($user->user_type !== 4 || $user->status !== 1) {
            return redirect('/scan')->with('error', 'Unauthorized access. This account is for Scanner profiles only.');
        }

        return $next($request);
    }
}
