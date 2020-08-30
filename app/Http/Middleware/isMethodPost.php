<?php

namespace App\Http\Middleware;

use Closure;

class isMethodPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($request->isMethod('GET'))
        {
            return redirect(url('/'));
        }
        return $next($request);
    }
}
