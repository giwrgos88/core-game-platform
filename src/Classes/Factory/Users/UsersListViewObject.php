<?php

namespace Giwrgos88\Game\Core\Classes\Factory\Users;

use Auth;
use Giwrgos88\Game\Core\Models\Admin\Users;
use Giwrgos88\Game\Core\Repositories\Interfaces\Factory\FactoryInterface as IFactory;

final class UsersListViewObject implements IFactory {
	/**
	 * @var Singleton
	 */
	private static $instance;

	/**
	 * gets the instance via lazy initialization (created on first usage)
	 */
	public static function getInstance(): UsersListViewObject {
		if (null === static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * is not allowed to call from outside to prevent from creating multiple instances,
	 * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
	 */
	private function __construct() {
	}

	/**
	 * prevent the instance from being cloned (which would create a second instance of it)
	 */
	private function __clone() {
	}

	/**
	 * prevent from being unserialized (which would create a second instance of it)
	 */
	private function __wakeup() {
	}

	public function get() {
		if (Auth::guard('core_user')->user()->level() > 2) {
			return Users::where('id', Auth::guard('core_user')->user()->id)->orderBy('id', 'ASC')->paginate(config('core_game.pagination'));
		}

		return Users::with('roles')->whereHas('roles', function ($q) {
			$q->where('level', '>', Auth::guard('core_user')->user()->level());
		}
		)
			->paginate(config('core_game.pagination'));
	}
}