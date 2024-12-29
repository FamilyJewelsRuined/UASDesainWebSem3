<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateImageColumnInProgrammersTable extends Migration
{
    public function up()
    {
        Schema::table('programmers', function (Blueprint $table) {
            $table->string('image')->default('default.jpg')->change();
        });
    }

    public function down()
    {
        Schema::table('programmers', function (Blueprint $table) {
            $table->string('image')->default(null)->change();
        });
    }
}
