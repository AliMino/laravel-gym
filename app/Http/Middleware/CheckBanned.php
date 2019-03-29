<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class CheckBanned
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
        if (auth()->check() && auth()->user()->isBanned()) {
            // Find the latest ban record
            /* $ban = $user->bans()->latest()->first(); */
            auth()->logout();


            // Store ban reason to the session
            \Session::put('ban-reason', 'enjoy');

            return redirect()->route('login');

        }
        
        return $next($request);
    }
}
