<?php

namespace App\Http\Middleware;

use Closure;

class panelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (auth()->user()->admin()) {
            return $next($request);
        } elseif (!auth()->user()->admin()) {
            return redirect('/');
        }
    }
}
