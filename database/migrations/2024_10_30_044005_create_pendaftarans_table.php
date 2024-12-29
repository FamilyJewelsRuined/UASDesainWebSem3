<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jamaah_id');
            $table->unsignedBigInteger('paket_id');
            $table->date('tanggal_daftar');
            $table->string('status');
            $table->timestamps();

            $table->foreign('jamaah_id')->references('id')->on('jamaah')->onDelete('cascade');
            $table->foreign('paket_id')->references('id')->on('jadwalkeberangkatan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
}
