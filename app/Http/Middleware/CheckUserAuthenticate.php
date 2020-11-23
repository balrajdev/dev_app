<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;



class CheckUserAuthenticate
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
        $user = Auth::user();

        if ($user) {
            // user value cannot be found in session
            return redirect('/developers');
        }

        return $next($request);
    }
}
