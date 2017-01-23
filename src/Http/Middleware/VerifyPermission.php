<?php

namespace Giwrgos88\Game\Core\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Ultraware\Roles\Exceptions\PermissionDeniedException;

class VerifyPermission {
	/**
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param Guard $auth
	 */
	public function __construct(Guard $auth) {
		$this->auth = Auth::guard('core_user');
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param Request $request
	 * @param \Closure $next
	 * @param int|string $permission
	 * @return mixed
	 * @throws \Ultraware\Roles\Exceptions\PermissionDeniedException
	 */
	public function handle($request, Closure $next, $permission) {
		$permissionsList = $this->auth->user()->userPermissions->pluck('slug')->toArray();
		if ($this->auth->check() && in_array($permission, $permissionsList)) {
			return $next($request);
		}

		throw new PermissionDeniedException($permission);
	}
}
