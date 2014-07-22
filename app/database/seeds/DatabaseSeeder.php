<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('InstitucionesSeeder');
		$this->call('SectoresSeeder');
        $this->call('UsuariosSeeder');
	}

}
