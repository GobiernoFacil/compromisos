<?php

class UsersTableSeeder extends Seeder{
  public function run(){
    User::create([
      'username'  => 'arturo@cordova.com',
      'password'  => Hash::make('gorigori'),
      'name'      => 'Arturo Córdova',
      'charge'    => 'Director de obras',
      'phone'     => '2484841506',
      'user_type' => 'government',
      'is_admin'  => TRUE
    ]);
  }
}
