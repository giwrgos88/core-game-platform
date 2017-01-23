<?php

namespace Giwrgos88\Game\Core\Http\Controllers\Admin;

use Giwrgos88\Game\Core\Classes\Factory\ParentFactory;
use Giwrgos88\Game\Core\Http\Controllers\Controller;
use Giwrgos88\Game\Core\Http\Requests\Admin\RolesPostRequest;
use Giwrgos88\Game\Core\Http\Requests\Admin\UserPostRequest;
use Giwrgos88\Game\Core\Models\Admin\Role;
use Giwrgos88\Game\Core\Models\Admin\Users;

class UsersController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$users = $this->objectFactory->create(ParentFactory::USERS)
			->get();

		return view('core::backend.pages.users.users', ['users' => $users]);
	}

	public function create() {

		$roles = $this->objectFactory->create(ParentFactory::ROLES)
			->get();
		$roles = $roles->pluck('name', 'id');
		return view('core::backend.pages.users.new', ['roles' => $roles]);
	}

	public function edit($id) {
		$user = $this->objectFactory->create(ParentFactory::USERVIEW)
			->setData(['id' => $id])
			->get();

		if (is_null($user)) {
			abort('404', 'Page not found.');
		}

		$roles = $this->objectFactory->create(ParentFactory::ROLES)
			->get();
		$roles = $roles->pluck('name', 'id');

		return view('core::backend.pages.users.new', ['user' => $user, 'roles' => $roles]);
	}

	public function store(UserPostRequest $request) {
		$data = $request->all();
		$data['status'] = 'active';
		$user = Users::create($data);
		if (!$user) {
			redirect()->back()->with('error', [trans('core::core.error')]);
		}

		$role = Role::find($request->get('roles'));
		$permissions = $role->permissions;
		$user->attachRole($role);
		foreach ($permissions as $key => $permission) {
			$user->attachPermission($permission);
		}
		session()->flash('success', trans('core::core.success'));
		return redirect()->route('Core::admin.users.edit', $user->id);
	}

	public function update(UserPostRequest $request) {

		$user = Users::find($request->get('id'))
			->update($request->all());
		if ($user) {
			$user = Users::find($request->get('id'));
			$user->detachAllRoles();
			$role = Role::find($request->get('roles'));
			$permissions = $role->permissions;
			$user->attachRole($role);
			$user->detachAllPermissions();
			foreach ($permissions as $key => $permission) {
				$user->attachPermission($permission);
			}
			session()->flash('success', trans('core::core.success'));
			return redirect()->back();
		}
	}

	public function destroy($id) {
		$user = $this->objectFactory->create(ParentFactory::USERVIEW)
			->setData(['id' => $id])
			->get();
		if (is_null($user)) {
			abort('404', 'Page not found.');
		}
		$user->destroy();

		return redirect()->route('Core::admin.users');
	}

	public function roles() {
		$roles = $this->objectFactory->create(ParentFactory::ROLES)
			->get();
		return view('core::backend.pages.users.roles', ['roles' => $roles]);
	}

	public function rolesEdit($id) {
		$role = $this->objectFactory->create(ParentFactory::ROLEVIEW)
			->setData(['id' => $id])
			->get();

		if (is_null($role)) {
			abort('404', 'Page not found.');
		}

		return view('core::backend.pages.users.roles_edit', ['role' => $role]);
	}

	public function rolesUpdate(RolesPostRequest $request) {
		$role = Role::where(['id' => $request->get('role')])->firstOrFail();
		$role->detachAllPermissions();

		$role->attachPermission($request->get('permission'));
		$users = $role->users->pluck('id');

		foreach ($users as $key => $userID) {
			$user = Users::find($userID);
			$user->detachAllPermissions();
			foreach ($request->get('permission') as $permission_key => $permission) {
				$user->attachPermission($permission);
			}
		}
		session()->flash('success', trans('core::core.success'));
		return redirect()->back();
	}
}