<?php

namespace Giwrgos88\Game\Core\Models\Admin;

use Giwrgos88\Game\Core\Classes\Traits\RoleHasRelations;
use Illuminate\Database\Eloquent\Model;
use Ultraware\Roles\Contracts\RoleHasRelations as RoleHasRelationsContract;
use Ultraware\Roles\Traits\Slugable;

class Role extends Model implements RoleHasRelationsContract {
	use Slugable, RoleHasRelations;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'slug', 'description', 'level'];

	/**
	 * Create a new model instance.
	 *
	 * @param array $attributes
	 */
	public function __construct(array $attributes = []) {
		parent::__construct($attributes);

		if ($connection = config('roles.connection')) {
			$this->connection = $connection;
		}
	}
}
