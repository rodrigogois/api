<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConsultantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('consultants', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_consultants_users')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('consultants', function(Blueprint $table)
		{
			$table->dropForeign('fk_consultants_users');
		});
	}

}
