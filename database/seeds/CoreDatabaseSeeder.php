<?php

use Giwrgos88\Game\Core\Models\Admin\Role;
use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Permission;

class CoreDatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$superadminRole = Role::create([
			'name' => 'Super Admin',
			'slug' => 'super.admin',
			'level' => 1,
		]);

		$adminRole = Role::create([
			'name' => 'Admin',
			'slug' => 'admin',
			'level' => 2,
		]);

		$agentRole = Role::create([
			'name' => 'Agent',
			'slug' => 'agent',
			'level' => 3,
		]);

		$analystRole = Role::create([
			'name' => 'Analyst',
			'slug' => 'analyst',
			'level' => 4,
		]);

		$clientRole = Role::create([
			'name' => 'Client',
			'slug' => 'client',
			'level' => 5,
		]);

		$viewParticipantPermission = Permission::create([
			'name' => 'View Participants',
			'slug' => 'view.participants',
		]);

		$editParticipantPermission = Permission::create([
			'name' => 'Edit Participants',
			'slug' => 'edit.participants',
		]);

		$createUsersPermission = Permission::create([
			'name' => 'Create users',
			'slug' => 'create.users',
		]);

		$viewUsersPermission = Permission::create([
			'name' => 'View users',
			'slug' => 'view.users',
		]);

		$editUsersPermission = Permission::create([
			'name' => 'Edit users',
			'slug' => 'edit.users',
		]);

		$deleteUsersPermission = Permission::create([
			'name' => 'Delete users',
			'slug' => 'delete.users',
		]);

		$exportPermission = Permission::create([
			'name' => 'Create export',
			'slug' => 'create.export',
		]);

		$viewRolesPermission = Permission::create([
			'name' => 'View roles',
			'slug' => 'view.roles',
		]);

		$editRolesPermission = Permission::create([
			'name' => 'Edit roles',
			'slug' => 'edit.roles',
		]);
		/**
		 * Attach Super Admin permissions
		 *
		 */

		$superadminRole->attachPermission($viewParticipantPermission);
		$superadminRole->attachPermission($editParticipantPermission);
		$superadminRole->attachPermission($createUsersPermission);
		$superadminRole->attachPermission($viewUsersPermission);
		$superadminRole->attachPermission($editUsersPermission);
		$superadminRole->attachPermission($deleteUsersPermission);
		$superadminRole->attachPermission($exportPermission);
		$superadminRole->attachPermission($viewRolesPermission);
		$superadminRole->attachPermission($editRolesPermission);

		/**
		 * Attach Admin permissions
		 *
		 */
		$adminRole->attachPermission($viewParticipantPermission);
		$adminRole->attachPermission($editParticipantPermission);
		$adminRole->attachPermission($createUsersPermission);
		$adminRole->attachPermission($viewUsersPermission);
		$adminRole->attachPermission($editUsersPermission);
		$adminRole->attachPermission($deleteUsersPermission);
		$adminRole->attachPermission($exportPermission);
		$adminRole->attachPermission($viewRolesPermission);
		$adminRole->attachPermission($editRolesPermission);

		/**
		 * Attach Agent permissions
		 *
		 */
		$agentRole->attachPermission($viewParticipantPermission);
		$agentRole->attachPermission($viewUsersPermission);
		$agentRole->attachPermission($editParticipantPermission);
		$agentRole->attachPermission($editUsersPermission);

		/**
		 * Attach Analyst permissions
		 *
		 */
		$analystRole->attachPermission($viewParticipantPermission);
		$analystRole->attachPermission($editParticipantPermission);
		$analystRole->attachPermission($editUsersPermission);
		$analystRole->attachPermission($viewUsersPermission);

		/**
		 * Attach Client permissions
		 *
		 */
		$clientRole->attachPermission($viewParticipantPermission);
		$clientRole->attachPermission($editParticipantPermission);
		$clientRole->attachPermission($editUsersPermission);
		$clientRole->attachPermission($viewUsersPermission);
	}
}