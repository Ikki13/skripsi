<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelanggan_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('tanggal_jual')->nullable();
            $table->bigInteger('banyak')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->bigInteger('total_price')->default(0);
            $table->bigInteger('total_beli');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
