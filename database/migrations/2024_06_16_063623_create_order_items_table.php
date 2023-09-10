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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('obat_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('banyak');
            $table->timestamps();

            $table->foreign('obat_id')
            ->references('id')->on('obats')
            ->onDelete('cascade');

            $table->foreign('pelanggan_id')
            ->references('id')->on('pelanggans')
            ->onDelete('cascade');

            $table->foreign('order_id')
            ->references('id')->on('orders')
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
        Schema::dropIfExists('order_items');
    }
};
