<?php

namespace Giwrgos88\Game\Core\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ultraware\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Ultraware\Roles\Traits\HasRoleAndPermission;

class Users extends Authenticatable implements HasRoleAndPermissionContract {
	use Notifiable, HasRoleAndPermission;

	protected $table = 'core_users';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'last_login_ip', 'last_login_at', 'status',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function setPasswordAttribute($password) {
		$this->attributes['password'] = bcrypt($password);
	}
}
