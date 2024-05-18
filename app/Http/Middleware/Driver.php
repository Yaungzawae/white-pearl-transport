<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use PhpParser\Node\ClosureUse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Driver
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->expectsJson()) {
            if(($request->is('driver') || $request->is('driver/*'))){
                return redirect()->route('driver.login');
            }
        }
        return $next($request);
    }
}
