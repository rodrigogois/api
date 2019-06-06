<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('consultant_id')->unsigned()->index('fk_clients_consultants');
			$table->string('name', 120);
			$table->string('email', 191)->nullable();
			$table->string('phone', 20)->nullable();
			$table->string('address', 250)->nullable();
			$table->text('observation', 65535)->nullable();
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
		Schema::drop('clients');
	}

}
