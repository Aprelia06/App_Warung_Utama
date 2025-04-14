<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('catatan'); // tambahin kolom user_id
            $table->foreign('user_id')->references('userID')->on('users')->onDelete('cascade'); // foreign key ke users.userID
        });
    }
    
    public function down()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
    
}
