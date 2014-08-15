<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    // CREATE THE USERS TABLE
    Schema::create('users', function($table){
      $table->increments('id');
      $table->string('username');
      $table->string('password');
      $table->string('name');
      $table->string('charge');
      $table->string('phone');
      $table->enum('user_type', ['government', 'society']);
      $table->text('remember_token')->nullable();
      $table->boolean('is_admin');
      $table->timestamps();
    });
    
    // CREATE COMMITMENTS TABLE
    Schema::create('commitments', function($table){
      $table->increments('id');
      $table->string('title');
      $table->string('plan')->nullable();
      $table->text('description');
      $table->text('characteristics');
      $table->text('status');
      $table->integer('government_user')
        ->default(0)
        ->nullable();
      $table->integer('society_user')
        ->default(0)
        ->nullable();
      $table->timestamps();
    });

    // CREATE THE STEPS TABLE
    Schema::create('steps', function($table){
      $table->increments('id');
      $table->unsignedInteger('commitment_id');
      $table->date('ends');
      $table->enum('step_num', ['1','2','3','4']);
      $table->timestamps();

      $table->foreign('commitment_id')
        ->references('id')
        ->on('commitments')
        ->onDelete('cascade');
    });

    // CREATE THE OBJECTIVES TABLE
    Schema::create('objectives', function($table){
      $table->increments('id');
      $table->unsignedInteger('step_id');
      $table->integer('step_num');
      $table->integer('event_num');
      $table->enum('status', ['a', 'b', 'c', 'd']);
      $table->text('description')->nullable();
      $table->string('url')->nullable();
      $table->string('agent')->nullable();
      $table->string('agent_url')->nullable();
      $table->text('advance_description')->nullable();
      $table->text('finish_description')->nullable();
      $table->timestamps();
      $table->text('title')->nullable();

      $table->foreign('step_id')
        ->references('id')
        ->on('steps')
        ->onDelete('cascade');
    });

  
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    // REMOVE ALL THE TABLES
    Schema::drop('users');
    Schema::drop('objectives');
    Schema::drop('steps');
    Schema::drop('commitments');
  }

}
