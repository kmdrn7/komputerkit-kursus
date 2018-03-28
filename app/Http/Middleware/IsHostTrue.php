<?php

namespace App\Http\Middleware;

use Closure;

class IsHostTrue
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
		$host = $request->getHttpHost();
		if ( $host == env('APP_HOST', 'null') ) {
			return $next($request);
		} else {
			return redirect('/');
		}
    }
}
