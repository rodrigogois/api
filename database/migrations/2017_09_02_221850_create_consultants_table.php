<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsultantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consultants', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('user_id')->unsigned()->nullable()->index('user');
			$table->string('phone', 20)->nullable();
			$table->string('address')->nullable();
			$table->text('photo', 65535)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('consultants');
	}

}
