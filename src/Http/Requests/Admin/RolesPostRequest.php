<?php

namespace Giwrgos88\Game\Core\Http\Requests\Admin;

use Giwrgos88\Game\Core\Http\Requests\Request;

class RolesPostRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return $this->user()->hasPermission('edit.roles');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'role' => 'required|int|exists:roles,id',
			'permission.*' => 'int|exists:permissions,id',
		];
	}
}
