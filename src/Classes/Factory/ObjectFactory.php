<?php

namespace Giwrgos88\Game\Core\Classes\Factory;

use Giwrgos88\Game\Core\Classes\Factory\Dashboard\DashboardViewObject;
use Giwrgos88\Game\Core\Classes\Factory\Export\ExportingFileObject;
use Giwrgos88\Game\Core\Classes\Factory\Export\ExportingViewObject;
use Giwrgos88\Game\Core\Classes\Factory\ParentFactory;
use Giwrgos88\Game\Core\Classes\Factory\Participant\ParticipantsListViewObject;
use Giwrgos88\Game\Core\Classes\Factory\Participant\ParticipantViewObject;
use Giwrgos88\Game\Core\Classes\Factory\Roles\RolesListViewObject;
use Giwrgos88\Game\Core\Classes\Factory\Roles\RoleViewObject;
use Giwrgos88\Game\Core\Classes\Factory\Users\UsersListViewObject;
use Giwrgos88\Game\Core\Classes\Factory\Users\UserViewObject;

class ObjectFactory extends ParentFactory {
	protected function createObject(string $type) {
		switch ($type) {
		case parent::DASHBOARD:
			return DashboardViewObject::getInstance();
		case parent::PARTICIPANTS:
			return ParticipantsListViewObject::getInstance();
		case parent::PARTICIPANTVIEW:
			return ParticipantViewObject::getInstance();
		case parent::USERS:
			return UsersListViewObject::getInstance();
		case parent::EXPORT:
			return ExportingViewObject::getInstance();
		case parent::EXPORTFILE:
			return ExportingFileObject::getInstance();
		case parent::USERVIEW:
			return UserViewObject::getInstance();
		case parent::ROLES:
			return RolesListViewObject::getInstance();
		case parent::ROLEVIEW:
			return RoleViewObject::getInstance();
		default:
			throw new \InvalidArgumentException("$type is not a valid type");
		}
	}
}