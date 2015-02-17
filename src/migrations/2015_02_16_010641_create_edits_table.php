<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditsTable extends Migration
{
	public function up()
	{

        Schema::create('edits', function(Blueprint $table) {
            $user = \App::make(\Config::get('auth.model'));

            $table->increments('id');
            $table->string('field_name');
            $table->longText('old_value');
            $table->longText('new_value');
            $table->integer('page_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references($user['primaryKey'])->on($user['table'])->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
	}

	public function down()
	{
        Schema::drop('edits');
	}
}
