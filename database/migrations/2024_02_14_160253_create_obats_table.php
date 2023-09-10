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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->foreignId("unit_id");
            $table->string("nama_obat")->nullable();
            $table->string("stok")->nullable();
            $table->string("kadaluwarsa")->nullable();
            $table->text("deskripsi_obat");
            $table->string("harga_beli");
            $table->string("harga_jual");
            $table->string("gambar")->nullable();
            $table->timestamps();

            $table->foreign('unit_id')
            ->references('id')->on('units')
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
        Schema::dropIfExists('obats');
    }
};
