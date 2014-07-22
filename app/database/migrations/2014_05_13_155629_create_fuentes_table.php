<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuentesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fuentes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nombre', 45);
            $table->enum('tipo', array('area','subarea','subsubarea'));
            $table->integer('fuente_padre_id')->unsigned()->nullable();
			$table->timestamps();

            $table->foreign('fuente_padre_id')->references('id')->on('fuentes')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fuentes');
	}

}
