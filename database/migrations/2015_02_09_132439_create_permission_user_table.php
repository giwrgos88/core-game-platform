<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionUserTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('permission_users', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('permission_id')->unsigned()->index();
			$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
			$table->integer('users_id')->unsigned()->index();
			$table->foreign('users_id')->references('id')->on('core_users')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('permission_users');
	}
}
