<?php

namespace Giwrgos88\Game\Core\Http\Middleware;

use Auth;
use Closure;

class Authentication {
	/**
	 * Allow only users which are not
	 * logged in to access the url
	 *
	 * @param  Http  $request
	 * @param  Closure $next
	 * @return Closure $next
	 */
	public function handle($request, Closure $next) {
		if (!Auth::guard('core_user')->check()) {
			return $next($request);
		} else {
			return redirect()->route('Core::admin.dashboard');
		}
	}
}