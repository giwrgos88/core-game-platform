<?php

namespace Giwrgos88\Game\Core\Classes\Factory\Roles;

use Giwrgos88\Game\Core\Models\Admin\Role;
use Giwrgos88\Game\Core\Repositories\Interfaces\Factory\FactoryInterface as IFactory;

final class RolesListViewObject implements IFactory {
	/**
	 * @var Singleton
	 */
	private static $instance;

	/**
	 * gets the instance via lazy initialization (created on first usage)
	 */
	public static function getInstance(): RolesListViewObject {
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
		return Role::orderBy('id', 'ASC')->paginate(config('core_game.pagination'));
	}
}