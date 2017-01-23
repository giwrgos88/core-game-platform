<?php

namespace Giwrgos88\Game\Core\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ParticipantsMeta extends Model {

	protected $primaryKey = 'id';

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'participants_meta';

	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['participant_id', 'meta_key', 'meta_value'];

	public function participant() {
		return $this->belongsTo('Giwrgos88\Game\Core\Models\Admin\Participants', 'id', 'participant_id');
	}
}
