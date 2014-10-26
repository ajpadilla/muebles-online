<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nombre', 128);
			$table->string('nombre_comercial', 128);
			$table->text('direccion');
			$table->string('codigo_postal', 5);
			$table->integer('provincia_id')->index();
			$table->string('telefono_fijo', 15);
			$table->string('fax', 15);
			$table->string('email', 128)->unique();
			$table->string('password', 128);
			$table->boolean('activo');
			$table->string('rol', 64);
			$table->string('remember_token', 128);
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
		Schema::drop('users');
	}


}