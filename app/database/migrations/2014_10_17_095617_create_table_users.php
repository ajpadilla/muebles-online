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
		Schema::create('table_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username', 128)->unique();
			$table->string('email', 128)->unique();
			$table->string('password', 128);
			$table->string('remember_token', 128);
			$table->string('nombres', 128);
			$table->string('apellidos', 128);
			$table->string('codigo_postal', 5);
			$table->string('movil', 15);
			$table->string('telefono_fijo', 15);
			$table->string('fax', 15);
			$table->string('ubicacion', 256);
			$table->integer('ciudad_id')->index();
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
		Schema::drop('table_users');
	}

}
