<?php

namespace Giwrgos88\Game\Core\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class InstallerMiddleware {

	/**
	 * Responsible for checking if the project has been
	 * installed
	 *
	 * @param  Http  $request
	 * @param  Closure $next
	 * @return Closure $next
	 */
	public function handle($request, Closure $next) {

		if ((getenv('APP_INSTALLER') === false) || (getenv('APP_INSTALLER') === 'false')) {
			return Redirect::to('/install');
		}

		return $next($request);
	}
}