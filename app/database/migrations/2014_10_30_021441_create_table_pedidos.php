<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTablePedidos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('client_id');
			$table->integer('product_id');
			$table->integer('cantidad')->nullable()->default(0);
			$table->boolean('status')->default(false);
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
		Schema::drop('pedidos');
	}

}
