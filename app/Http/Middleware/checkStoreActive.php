<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class checkStoreActive
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


        if ($request->username != null){

            if ($request->username->store_active == 1){
                return $next($request);
            }else{
                return redirect('/');
            }

        }else{

            if ($request->userStore->store_active == 1){
                return $next($request);
            }else{
                return redirect('/');
            }
        }

    }
}
