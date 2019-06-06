<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCataloguesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('catalogues', function(Blueprint $table)
		{
			$table->foreign('consultant_id', 'fk_consultant_id_catalogue')->references('id')->on('consultants')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('catalogues', function(Blueprint $table)
		{
			$table->dropForeign('fk_consultant_id_catalogue');
		});
	}

}
