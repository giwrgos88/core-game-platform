<?php

namespace Giwrgos88\Game\Core\Classes\Factory;

use Giwrgos88\Game\Core\Repositories\Interfaces\Factory\FactoryInterface as IFactory;

abstract class ParentFactory {

	const DASHBOARD = 'dashboard';
	const PARTICIPANTVIEW = 'participant_view';
	const USERS = 'users';
	const EXPORT = 'export_view';
	const EXPORTFILE = 'export_file';
	const USERVIEW = 'user_view';
	const ROLES = 'roles';
	const ROLEVIEW = 'role_view';
	const PARTICIPANTS = 'participants';

	abstract protected function createObject(string $type);

	public function create(string $type): IFactory{
		$obj = $this->createObject($type);
		return $obj;
	}
}