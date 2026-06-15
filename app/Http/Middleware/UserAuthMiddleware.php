<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    if(Auth::check()){
        $user = Auth::user();
        if($user->role == 'user'){
         return $next($request);
        }
    }else{
        return back()->with('error','Please Login First');
    }

    }
}
