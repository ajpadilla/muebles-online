<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableProducs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('codigo', 128)->unique();
			$table->string('nombre', 128);
			$table->text('descripcion')->nullable();
			$table->string('modelo', 128);
			$table->string('medidas', 128);
			$table->boolean('lacado');
			$table->decimal('precio_lacado', 10,4);
			$table->boolean('pulimento');
			$table->decimal('precio_pulimento', 10,4);
			$table->integer('cantidad');
			$table->decimal('precio', 10,4);
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
		Schema::drop('table_producs');
	}

}
