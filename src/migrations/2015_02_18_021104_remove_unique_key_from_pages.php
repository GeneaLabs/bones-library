<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUniqueKeyFromPages extends Migration
{
    public function up()
    {
        DB::statement('ALTER TABLE pages DROP INDEX `pages_title_unique`');
    }

    public function down()
    {
        DB::statement('ALTER TABLE pages ADD UNIQUE title');
    }
}
