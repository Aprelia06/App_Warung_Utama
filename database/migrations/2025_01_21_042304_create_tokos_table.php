<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {

            $table->bigIncrements('toko_id');
            $table->string('nama_toko', 50);            
            $table->string('nama_pemilik', 50);
            $table->text('alamat');
            $table->string('telepon', 15)->nullable();
            $table->enum('status_toko', ['aktif', 'non-aktif'])->default('aktif');
            $table->text('deskripsi')->nullable();
            $table->string('kategori_toko', 50)->nullable();
            $table->string('gambar_toko')->nullable(); // opsional
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
        Schema::dropIfExists('tokos');
    }
}
