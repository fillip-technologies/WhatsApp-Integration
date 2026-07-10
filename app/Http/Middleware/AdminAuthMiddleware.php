<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please Login First');
        }
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return redirect()->back()
                ->with('error', 'Unauthorized Access');
        }
        return $next($request);
    }
}