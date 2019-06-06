<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCataloguesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catalogues', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('consultant_id')->unsigned()->index('fk_consultant_id_catalogue');
			$table->string('name', 100);
			$table->string('code_catalogue', 30)->nullable();
			$table->dateTime('date_expiration')->nullable();
			$table->dateTime('date_rescue');
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
		Schema::drop('catalogues');
	}

}
