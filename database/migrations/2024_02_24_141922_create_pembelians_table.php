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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemasok_id');
            $table->foreignId('obat_id')->nullable();
            $table->string('harga_beli');
            $table->string('banyak');
            $table->string('kadaluwarsa')->nullable();
            $table->string('tanggal_beli');
            $table->string('total');
            $table->timestamps();

            $table->foreign('obat_id')
            ->references('id')->on('obats')
            ->onDelete('cascade');

            $table->foreign('pemasok_id')
            ->references('id')->on('pemasoks')
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
        Schema::dropIfExists('pembelians');
    }
};
