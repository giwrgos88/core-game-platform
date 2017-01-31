<?php

namespace Giwrgos88\Game\Core\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class ForceSSLMiddleware {
	public function handle($request, Closure $next) {

		if (env('APP_ENV') != 'local') {
			if (\Request::server('HTTP_X_FORWARDED_PROTO') != 'https') {
				return redirect()->secure($request->path());
			}
		}
		return $next($request);
	}
}
