<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeginPengaduans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->foreign('nik')->references('nik')->on('masyarakats');
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            //
        });
    }
}
