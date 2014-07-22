<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediosDeVerificacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medios_de_verificacion', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('tipo',64);
            $table->text('descripcion');
            $table->string('url', 512);
            $table->integer('compromiso_id')->unsigned();
			$table->timestamps();

            $table->foreign('compromiso_id')->references('id')->on('compromisos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medios_de_verificacion');
	}

}
