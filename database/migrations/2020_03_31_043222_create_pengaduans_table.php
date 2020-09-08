<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->bigIncrements('id_pengaduan');
            $table->date('tgl_pengaduan');
            $table->char('nik', 16)->index();
            $table->text('isi_laporan');
            $table->string('foto', 255)->nullable();
            $table->enum('status', ['0', 'proses', 'selesai']);
            $table->bigInteger('id_jenis')->index()->unsigned();
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
        Schema::dropIfExists('pengaduans');
    }
}
