<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->bigIncrements('detpesanan_id');
            $table->unsignedBigInteger('pesanan_id')->nullable();
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->decimal('harga', 15, 2);
            $table->integer('jumlah');
            $table->decimal('total', 15, 2);
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
        Schema::dropIfExists('detail_pesanans');
    }
}
