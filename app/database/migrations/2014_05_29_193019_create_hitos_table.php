<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHitosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('hitos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->integer('compromiso_id')->unsigned();
            $table->timestamps();

            $table->foreign('compromiso_id')->references('id')->on('compromisos')->onUpdate('cascade')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('hitos');
	}

}
