<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sectores', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nombre');
            $table->float('lat');
            $table->float('lng');
            $table->enum('tipo', array('pais', 'region', 'comuna', 'provincia'));
            $table->integer('sector_padre_id')->unsigned()->nullable();
			$table->timestamps();

            $table->foreign('sector_padre_id')->references('id')->on('sectores')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sectores');
	}

}
