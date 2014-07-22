<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPonderadorToHitoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hitos', function(Blueprint $table)
		{
			$table->float('ponderador');
            $table->float('avance');
		});

        Schema::table('compromisos', function(Blueprint $table)
        {
            $table->dropColumn('avance');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hitos', function(Blueprint $table)
		{
			$table->dropColumn('ponderador');
            $table->dropColumn('avance');
		});

        Schema::table('compromisos', function(Blueprint $table)
        {
            $table->float('avance');
        });
	}

}
