<?php

class UsersTableSeeder extends Seeder{
  public function run(){
    DB::table('users')->insert([
      // THE ADMIN
      [
        'username'  => 'arturo@cordova.com',
        'password'  => Hash::make('gorigori'),
        'name'      => 'Arturo Córdova',
        'charge'    => 'Director de obras',
        'phone'     => '2484841506',
        'user_type' => 'government',
        'is_admin'  => TRUE
      ],
      
      [
        'username'  => 'eduardo.vargas@presidencia.gob.mx',
        'password'  =>  Hash::make('eduardo1234'),
        'name'      => 'Eduardo Vargas',
        'charge'    => 'Gobierno Abierto',
        'phone'     => '5093 4800',
        'user_type' => 'government',
        'is_admin'  => TRUE
      ],
      
      [
        'username'  => 'gobierno.abierto@presidencia',
        'password'  =>  Hash::make('abierto1234'),
        'name'      => 'Gobierno Abierto',
        'charge'    => 'Gobierno Abierto',
        'phone'     => '5093 4800',
        'user_type' => 'government',
        'is_admin'  => TRUE
      ],
      
      [
        'username'  => 'ruizdeteresa@presidencia.gob.mx',
        'password'  =>  Hash::make('ruiz1234'),
        'name'      => 'Guillermo Ruiz de Teresa',
        'charge'    => 'Gobierno Abierto',
        'phone'     => '5093 4800',
        'user_type' => 'government',
        'is_admin'  => TRUE
      ],

      // Tu gobierno en un solo punto | gob.mx
      [
        'username'  => 'ymartinez@funcionpublica.gob.mx',
        'password'  => Hash::make('12345'),
        'name'      => 'Yolanda Martínez Mancilla',
        'charge'    => 'Titular de la Unidad de Gobierno Digital, Secretaría de la Función Pública',
        'phone'     => '20003000, Ext. 4074',
        'user_type' => 'government',
        'is_admin'  => FALSE
      ],

      [
        'username'  => 'secretario@tecnico.com',
        'password'  => Hash::make('12345'),
        'name'      => 'Secretariado Técnico Tripartita',
        'charge'    => 'Usuario genérico',
        'phone'     => '12345',
        'user_type' => 'society',
        'is_admin'  => FALSE
      ],

      // Regulación clara y transparente
      [
        'username'  => 'eduardo.romero@cofemer.gob.mx',
        'password'  => Hash::make('12345'),
        'name'      => 'Eduardo E. Romero Fong',
        'charge'    => 'Coordinador General de Manifestaciones de Impacto Regulatorio, Secretaría de Economía',
        'phone'     => '5729.9100 Ext. 22640',
        'user_type' => 'government',
        'is_admin'  => FALSE
      ],

      [
        'username'  => 'ricardo.corona@imco.org.mx',
        'password'  => Hash::make('12345'),
        'name'      => 'Ricardo Corona Real',
        'charge'    => 'Abogado General, IMCO',
        'phone'     => '5985.10.17 al 19 Ext. 150',
        'user_type' => 'society',
        'is_admin'  => FALSE
      ],

      // Normas accesibles
      [
        'username'  => 'alberto.esteban@economia.gob.mx',
        'password'  => Hash::make('12345'),
        'name'      => 'Alberto Ulises Esteban Marina',
        'charge'    => 'Director General de Normas, Secretaría de Economía',
        'phone'     => '5729 6100, Ext. 43200',
        'user_type' => 'government',
        'is_admin'  => FALSE
      ],

      // Registro de detenidos
      [
        'username'  => 'mario.miguel@pgr.gob.mx',
        'password'  => Hash::make('12345'),
        'name'      => 'Mario Miguel Ortega',
        'charge'    => 'Director General de Asuntos Jurídicos, Procuraduría General de la República',
        'phone'     => '53-46-00-00, ext. 5706',
        'user_type' => 'government',
        'is_admin'  => FALSE
      ],

      [
        'username'  => 'rayala@segob.gob.mx',
        'password'  => Hash::make('12345'),
        'name'      => 'Raúl Ayala Cabrera',
        'charge'    => 'Coordinador de Asesores de la Oficialía Mayor, Secretaría de Gobernación',
        'phone'     => '5093-3000, ext. 33016',
        'user_type' => 'government',
        'is_admin'  => FALSE
      ],

      [
        'username'  => 'ana@article19.org',
        'password'  => Hash::make('12345'),
        'name'      => 'Ana Cristina Ruelas',
        'charge'    => 'Oficial del Programa de Acceso a la Información de ARTICLE 19',
        'phone'     => '10546500, ext. 106',
        'user_type' => 'society',
        'is_admin'  => FALSE
      ],

      // Base de datos de personas desaparecidas

      // Padrón único y abierto de beneficiarios
      [
        'username'  => 'evangelica.villalpandor@sedesol.gob.mx',
        'password'  => Hash::make('12345'),
        'name'      => 'María Evangélica Villalpando Rodríguez',
        'charge'    => 'Titular de la unidad de la Abogada General y Comisionada para la Transparencia, Secretaría de Desarrollo Social',
        'phone'     => '5328-5000 ext.51601',
        'user_type' => 'government',
        'is_admin'  => FALSE
      ],

      [
        'username'  => 'alejandro.gonzalez@gesoc.org.mx',
        'password'  => Hash::make('12345'),
        'name'      => 'Alejandro González Arreola',
        'charge'    => 'Director General, GESOC',
        'phone'     => '5573-2399 Ext.18',
        'user_type' => 'society',
        'is_admin'  => FALSE
      ]

    ]);
  }
}
