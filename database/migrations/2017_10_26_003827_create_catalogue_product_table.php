<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCatalogueProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catalogue_product', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('catalogue_id')->unsigned()->index('fk_catalogue_id__catalogue_product');
			$table->bigInteger('product_id')->unsigned()->index('fk_product_id__catalogue_product');
			$table->string('code', 35)->nullable();
			$table->decimal('value', 10);
			$table->char('status', 1)->nullable()->default('A');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('catalogue_product');
	}

}
