<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checke_user_join
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
        if(auth()->check()) {
            $user=Auth::user();
            if($user->store_active == 0){
                return $next($request);
            }
            return redirect('/');
        }

        return redirect('/');
    }
}
