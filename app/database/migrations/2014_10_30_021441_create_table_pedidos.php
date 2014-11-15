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
			$table->integer('product_id');
			$table->integer('factura_id');
			$table->string('color', 64);
			$table->integer('cantidad')->nullable()->default(0);
			$table->string('nombre_cliente', 64)->nullable();
			$table->string('direccion', 256)->nullable();
			$table->string('observacion', '256')->nullable();
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
