<?php

class UsuariosSeeder extends Seeder {
    public function run(){
        DB::table('usuarios')->delete();

        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');

        DB::table('usuarios')->insert(array(
            'email' => 'admin@minsegpres.gob.cl',
            'nombres' => 'Administrador',
            'apellidos' => 'Segpres',
            'password' => Hash::make('123456'),
            'created_at' => $date,
            'updated_at' => $date
        ));
    }
} 