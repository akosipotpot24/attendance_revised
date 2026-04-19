<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admin
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

    if (!in_array($user->user_type, [2, 3]) || $user->status != 1) {
        return redirect('/viewStudents')->with('error', 'Unauthorized access, Contact administrator for admin approval. ');
    }
        return $next($request);
    }
}
