<?php

namespace App\Http\Middleware;

use App;
use Hash;
use Closure;

class NoAdminNoEntry
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
		if ( Hash::check('cariuang1milyar', $request->cookie('device_auth')) ) {
			return $next($request);
		}

		App::abort(403, 'message');
    }
}
