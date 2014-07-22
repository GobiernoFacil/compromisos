<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompromisosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compromisos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nombre', 255);
            $table->string('url', 512);
            $table->text('descripcion');
            $table->text('objetivo');
            $table->boolean('publico');
            $table->float('avance');
            $table->text('avance_descripcion');
            $table->string('plazo',64);
            $table->decimal('presupuesto',12,2)->nullable();
            $table->integer('institucion_responsable_plan_id')->unsigned();
            $table->integer('institucion_responsable_implementacion_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('fuente_id')->unsigned();
			$table->timestamps();

            $table->foreign('institucion_responsable_plan_id')->references('id')->on('instituciones')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('institucion_responsable_implementacion_id')->references('id')->on('instituciones')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fuente_id')->references('id')->on('fuentes')->onUpdate('cascade')->onDelete('cascade');
		});

        Schema::create('compromiso_tag', function(Blueprint $table)
        {
            $table->integer('compromiso_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('compromiso_id')->references('id')->on('compromisos')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });

        Schema::create('compromiso_sector', function(Blueprint $table)
        {
            $table->integer('compromiso_id')->unsigned();
            $table->integer('sector_id')->unsigned();

            $table->foreign('compromiso_id')->references('id')->on('compromisos')->onDelete('cascade');
            $table->foreign('sector_id')->references('id')->on('sectores')->onDelete('cascade');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('compromiso_tag');
        Schema::drop('compromiso_sector');
		Schema::drop('compromisos');
	}

}
