<?php

namespace Giwrgos88\Game\Core\Classes\Factory\Roles;

use Giwrgos88\Game\Core\Models\Admin\PermissionRole;
use Giwrgos88\Game\Core\Models\Admin\Role;
use Giwrgos88\Game\Core\Repositories\Interfaces\Factory\FactoryInterface as IFactory;
use Ultraware\Roles\Models\Permission;
use Validator;

final class RoleViewObject implements IFactory {
	/**
	 * @var Singleton
	 */
	private static $instance;

	protected $data = [];

	protected $rules = [
		'id' => 'int|required',
	];

	/**
	 * gets the instance via lazy initialization (created on first usage)
	 */
	public static function getInstance(): RoleViewObject {
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

	public function setData($data) {
		$this->data = $data;
		return $this;
	}

	public function get() {
		$validator = Validator::make($this->data, $this->rules);
		if ($validator->fails()) {
			return null;
		}

		$role = Role::where($this->data)->firstOrFail();
		$this->id = $role->id;
		foreach ($role->getFillable() as $key => $value) {
			$this->{$value} = $role->{$value};
		}

		$this->relationship = PermissionRole::where('role_id', $role->id)->pluck('permission_id')->toArray();
		$this->permissions = Permission::all()->pluck('name', 'id');
		return $this;
	}
}