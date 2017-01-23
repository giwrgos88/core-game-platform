<?php

namespace Giwrgos88\Game\Core\Classes\Factory\Participant;

use Giwrgos88\Game\Core\Models\Admin\Participants;
use Giwrgos88\Game\Core\Repositories\Interfaces\Factory\FactoryInterface as IFactory;
use Validator;

final class ParticipantViewObject implements IFactory {
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
	public static function getInstance(): ParticipantViewObject {
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
		return Participants::where($this->data)->firstOrFail();
	}
}