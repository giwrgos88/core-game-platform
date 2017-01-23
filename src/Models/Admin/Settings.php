<?php

namespace Giwrgos88\Game\Core\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {
	protected $primaryKey = null;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'settings';

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
	protected $fillable = ['website_title', 'website_email', 'game_start_date', 'game_end_date', 'facebook_app_id',
		'facebook_app_secret_key', 'facebook_app_active', 'google_analytics_code', 'google_analytics_code_active'];
}
