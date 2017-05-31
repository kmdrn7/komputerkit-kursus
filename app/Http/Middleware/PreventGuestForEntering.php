<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PreventGuestForEntering
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
		if ( !Auth::check() ) {
			redirect('/');
		}

        return $next($request);
    }
}
