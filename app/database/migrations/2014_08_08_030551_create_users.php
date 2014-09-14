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
      $table->string('remember_token')->nullable();
      $table->boolean('is_admin');
      $table->timestamps();
    });
    
    // CREATE COMMITMENTS TABLE
    Schema::create('commitments', function($table){
      $table->increments('id');
      $table->integer('commitment_num');
      $table->string('title');
      $table->string('plan')->nullable();
      $table->text('description');
      $table->text('characteristics');
      $table->text('status');
      $table->timestamps();
    });

    // CREATE THE USERS - COMMITMENTS TABLE
    Schema::create('commitment_user', function($table){
      $table->increments('id');
      $table->unsignedInteger('user_id');
      $table->unsignedInteger('commitment_id');

      $table->foreign('commitment_id')
        ->references('id')
        ->on('commitments')
        ->onDelete('cascade');

      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');
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
      $table->text('description_excerpt')->nullable();
      $table->string('mir_url')->nullable();
      $table->string('mir_file')->nullable();
      $table->string('url')->nullable();
      $table->text('advance_description')->nullable();
      $table->text('finish_description')->nullable();
      $table->string('selfie')->nullable(); // the new field
      $table->text('comments')->nullable();
      $table->timestamps();
      $table->text('title')->nullable();

      $table->foreign('step_id')
        ->references('id')
        ->on('steps')
        ->onDelete('cascade');
    });

    // CREATE THE AGENTS TABLE
    Schema::create('agents', function($table){
      $table->increments('id');
      $table->unsignedInteger('objective_id');
      $table->string('agent')->nullable();
      $table->string('agent_url')->nullable();
      $table->timestamps();

      $table->foreign('objective_id')
        ->references('id')
        ->on('objectives')
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
    Schema::drop('agents');
    Schema::drop('objectives');
    Schema::drop('steps');
    schema::drop('commitment_user');
    Schema::drop('commitments');
    Schema::drop('users');

  }

}
