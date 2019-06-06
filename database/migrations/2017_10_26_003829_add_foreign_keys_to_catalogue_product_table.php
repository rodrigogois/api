<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCatalogueProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('catalogue_product', function(Blueprint $table)
		{
			$table->foreign('catalogue_id', 'fk_catalogue_id__catalogue_product')->references('id')->on('catalogues')->onUpdate('RESTRICT')->onDelete('cascade');
			$table->foreign('product_id', 'fk_product_id__catalogue_product')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('catalogue_product', function(Blueprint $table)
		{
			$table->dropForeign('fk_catalogue_id__catalogue_product');
			$table->dropForeign('fk_product_id__catalogue_product');
		});
	}

}
