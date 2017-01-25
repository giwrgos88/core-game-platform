<?php

return [

	//Application Name
	'application-name' => '',

	//Administration backend Url. E.g yourdomain/backend
	'admin-prefix' => 'backend',

	//Administration login Url. E.g yourdomain/backend/login
	'login-prefix' => 'login',

	//Administration logout Url. E.g yourdomain/backend/logout
	'logout-prefix' => 'logout',

	//Enable if the application will use SSL
	'SSL_ENABLED' => false,

	'participant_meta_key' => null,

	/*
		Fields options to export on excel
		database key column => how will be displayed in excel
	*/
	'export_fields' => [
		'participant_fullname' => 'Name',
		'participant_email' => 'Email',
		'participant_phone' => 'Phone',
	],

	/*
		Export options
	*/
	'export_formats' => [
		'xls' => 'Excel',
		'csv' => 'CSV',
	],

	/*
		Number of latest participants of displaying in dashboard
	*/
	'dashboard_latest_participants' => 10,

	/**
	 * Pagination
	 */
	'pagination' => 20,
];
