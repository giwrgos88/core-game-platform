<?php

namespace Giwrgos88\Game\Core\Classes\Factory\Export;

use Giwrgos88\Game\Core\Classes\Export\CSVExporter as CSV;
use Giwrgos88\Game\Core\Classes\Export\ExcelExporter as Excel;
use Giwrgos88\Game\Core\Models\Admin\Participants;
use Giwrgos88\Game\Core\Repositories\Interfaces\Factory\FactoryInterface as IFactory;

final class ExportingFileObject implements IFactory {
	/**
	 * @var Singleton
	 */
	private static $instance;

	private $data = [];
	/**
	 * gets the instance via lazy initialization (created on first usage)
	 */
	public static function getInstance(): ExportingFileObject {
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

	public function setData(array $data) {
		$this->data = $data;
		return $this;
	}

	public function get() {
		if ((sizeof($this->data) == 0) ||
			(!isset($this->data['fields'])) ||
			(!isset($this->data['format']))) {
			return null;
		}

		if (!array_key_exists($this->data['format'], config('core_game.export_formats'))) {
			return null;
		}

		if (!is_array($this->data['fields'])) {
			return null;
		}
		$fields = [];
		foreach ($this->data['fields'] as $value) {
			if (!array_key_exists($value, config('core_game.export_fields'))) {
				return null;
			}
			$fields[] = $value;
		}

		$participants = Participants::select($fields)->get();

		if ($this->data['format'] == 'csv') {
			return CSV::generate($participants->toArray());
		} else {
			return Excel::generate($participants->toArray());
		}
	}
}