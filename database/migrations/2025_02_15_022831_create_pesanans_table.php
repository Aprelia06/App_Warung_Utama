<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->bigIncrements('pesanan_id');
            $table->date('tanggal_pesanan'); 
            $table->string('nama_pelanggan', 50);
            $table->string('no_telp', 15);
            $table->text('catatan')->nullable();
            $table->decimal('subtotal', 15, 2);
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
        Schema::dropIfExists('pesanans');
    }
}
