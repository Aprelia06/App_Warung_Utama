<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('transaksi_id');
            $table->unsignedBigInteger('pesanan_id')->nullable();
            $table->unsignedDecimal('total_pesanan', 15, 2);
            $table->enum('metode_pembayaran', ['cash', 'transfer']);
            $table->unsignedDecimal('uang_bayar', 15, 2);
            $table->unsignedDecimal('kembalian', 15, 2);
            $table->enum('status_pembayaran', ['pending', 'lunas']);
            $table->dateTime('waktu_transaksi');
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
        Schema::dropIfExists('transaksis');
    }
}