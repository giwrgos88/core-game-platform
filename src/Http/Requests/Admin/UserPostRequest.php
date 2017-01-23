<?php

namespace Giwrgos88\Game\Core\Http\Requests\Admin;

use Giwrgos88\Game\Core\Http\Requests\Request;
use Giwrgos88\Game\Core\Models\Admin\Users;

class UserPostRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		if (is_null($this->id)) {
			return $this->user()->level() <= 2 ? true : false;
		} else {
			if ($this->user()->level() == 1) {
				return true;
			} elseif ($this->user()->level() == 2) {
				if ($this->id == $this->user()->id) {
					return true;
				}
				$user = Users::find($this->id);
				return $user->level() > $this->user()->level() ? true : false;
			} else {
				return $this->id == $this->user()->id ? true : false;
			}
		}
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		$id = ($this->id) ?: NULL;
		$rules = [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:core_users,email,' . $id,
			'password' => $this->getUserPasswordRule('password'),
			'password_confirmation' => $this->getUserPasswordRule('password_confirmation'),
		];

		if (!is_null($id)) {
			$rules['id'] = 'exists:core_users,id';
		}

		return $rules;
	}

	private function getUserPasswordRule($type) {
		if ((!empty($this->request->get('password'))) && (!empty($this->request->get('password_confirmation')))) {
			if ($type == 'password') {
				return 'required|confirmed|between:6,50|confirmed';
			}

			return 'required|same:password';
		}

		return 'between:6,50';
	}

}
