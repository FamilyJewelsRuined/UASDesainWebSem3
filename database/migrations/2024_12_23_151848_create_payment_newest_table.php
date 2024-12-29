<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentNewestTable extends Migration
{
    public function up()
    {
        Schema::create('payment_newest', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daftar_id');
            $table->decimal('amount', 10, 2);
            $table->string('payment_method');
            $table->enum('status', ['pending', 'completed', 'failed']);
            $table->timestamps();

            $table->foreign('daftar_id')->references('id')->on('daftars')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_newest');
    }
}
