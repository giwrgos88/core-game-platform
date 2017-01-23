<?php

/*
|--------------------------------------------------------------------------
| Administation Routes
|--------------------------------------------------------------------------
|
| Here is where all the administration routes goes.
|
 */

Route::group(['prefix' => config('core_game.admin-prefix'), 'as' => 'Core::', 'namespace' => 'Admin', 'middleware' => ['auth:core_user']], function () {
	/*
		Dashboard routes
	*/
	Route::get('/', function () {
		return Redirect::to(URL::route('Core::admin.dashboard'));
	});

	Route::get('/dashboard', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);

	/*
		Participants routes
	*/
	Route::get('/participants', ['as' => 'admin.participants', 'middleware' => 'permission:view.participants', 'uses' => 'ParticipantsController@index']);

	Route::get('/participants/{id}/view', ['as' => 'admin.participants.show', 'middleware' => 'permission:edit.participants', 'uses' => 'ParticipantsController@show']);

	/*
		Users routes
	*/
	Route::get('/users', ['as' => 'admin.users', 'middleware' => 'permission:view.users', 'uses' => 'UsersController@index']);
	Route::get('/users/new', ['as' => 'admin.users.new', 'middleware' => 'permission:create.users', 'uses' => 'UsersController@create']);
	Route::post('/users/store', ['as' => 'admin.users.store', 'middleware' => 'permission:create.users', 'uses' => 'UsersController@store']);
	Route::get('/users/edit/{id}', ['as' => 'admin.users.edit', 'middleware' => 'permission:edit.users', 'uses' => 'UsersController@edit']);
	Route::post('/users/update', ['as' => 'admin.users.update', 'middleware' => 'permission:edit.users', 'uses' => 'UsersController@update']);

	/*
		Role routes
	*/
	Route::get('/users/roles', ['as' => 'admin.users.roles', 'middleware' => 'permission:edit.roles', 'uses' => 'UsersController@roles']);
	Route::get('/users/roles/edit/{id}', ['as' => 'admin.users.role.edit', 'middleware' => 'permission:edit.roles', 'uses' => 'UsersController@rolesEdit']);
	Route::post('/users/roles/update', ['as' => 'admin.users.roles.update', 'middleware' => 'permission:edit.roles', 'uses' => 'UsersController@rolesUpdate']);

	/*
		Export routes
	*/
	Route::get('/export', ['as' => 'admin.export', 'middleware' => 'permission:create.export', 'uses' => 'ExportingController@index']);
	Route::get('/export/file', ['as' => 'admin.export.file', 'middleware' => 'permission:create.export', 'uses' => 'ExportingController@export']);
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Here is where all the authentication routes goes.
|
 */

Route::group(['as' => 'Core::', 'namespace' => 'Auth'], function () {
	Route::get(config('core_game.admin-prefix') . '/' . config('core_game.login-prefix'), ['middleware' => ['no_auth'], 'as' => 'admin.auth.login', 'uses' => 'LoginController@showLoginForm']);
	Route::post(config('core_game.admin-prefix') . '/' . config('core_game.login-prefix'), ['middleware' => ['no_auth'], 'as' => 'admin.auth.login.post', 'uses' => 'LoginController@login']);
	Route::get(config('core_game.admin-prefix') . '/' . config('core_game.logout-prefix'), ['middleware' => ['auth:core_user'], 'as' => 'admin.auth.logout', 'uses' => 'LoginController@logout']);
});
