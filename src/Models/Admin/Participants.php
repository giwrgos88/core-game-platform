<?php

namespace Giwrgos88\Game\Core\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model {

	protected $primaryKey = 'id';

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'participants';

	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['participant_fullname', 'participant_email', 'participant_phone', 'participant_status'];

	/**
	 * Get resutls of the challane
	 */
	public function meta() {
		return $this->hasMany('Giwrgos88\Game\Core\Models\Admin\ParticipantsMeta', 'participant_id', 'id');
	}
}
