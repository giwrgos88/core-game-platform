<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParticipantsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('participants', function (Blueprint $table) {
			$table->increments('id');
			$table->string('participant_fullname')->nullable();
			$table->string('participant_email')->unique()->nullable();
			$table->string('participant_phone')->nullable();
			$table->string('participant_status', 10);
			$table->timestamps();
			$table->index(['id', 'participant_email']);
		});

		Schema::create('participants_meta', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('participant_id')->unsigned();
			$table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
			$table->string('meta_key');
			$table->longText('meta_value');
			$table->index(['id', 'participant_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('participants');
		Schema::drop('participants_meta');
	}
}
