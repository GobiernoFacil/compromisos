<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitucionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instituciones', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nombre', 255);
            $table->enum('tipo', array('partida','capitulo'));
            $table->integer('institucion_padre_id')->unsigned()->nullable();
			$table->timestamps();

            $table->foreign('institucion_padre_id')->references('id')->on('instituciones')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instituciones');
	}

}
