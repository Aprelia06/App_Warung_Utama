<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('produk_id');
            $table->unsignedBigInteger('kategori_produk_id')->nullable();
            $table->string('nama_produk', 50);            
            $table->string('deskripsi');
            $table->decimal('harga', 15, 2);
            $table->unsignedInteger('stok');
            $table->string('gambar_produk')->nullable(); // opsional
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
        Schema::dropIfExists('produks');
    }
}
