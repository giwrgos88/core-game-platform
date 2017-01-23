<?php

namespace Giwrgos88\Game\Core\Http\Controllers;

use Auth;
use Giwrgos88\Game\Core\Classes\Factory\ObjectFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Holds the factory instance.
	 *
	 * @var objectFactory
	 */
	protected $objectFactory;

	/**
	 * Holds the authenticated player.
	 *
	 * @var player
	 */
	protected $player;

	/**
	 * Default costructor.
	 */
	public function __construct() {
		$this->objectFactory = new ObjectFactory();
		$this->middleware(function ($request, $next) {
			$this->player = Auth::guard('core_user')->user();
			view()->share('authUser', $this->player);
			return $next($request);
		});
	}
}
