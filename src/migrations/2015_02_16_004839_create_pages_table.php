<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
	public function up()
	{
        Schema::create('pages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->unique();
            $table->longText('content');
            $table->text('summary');
            $table->integer('book_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
	}

	public function down()
	{
        Schema::drop('pages');
	}
}
