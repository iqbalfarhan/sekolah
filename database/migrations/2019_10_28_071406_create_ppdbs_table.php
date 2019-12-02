<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpdbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('kode_reg')->unique();
            $table->date('tanggal_daftar')->default(now());
            $table->enum('status', ['persiapan', 'mendaftar', 'terverifikasi', 'dikembalikan', 'diterima']);
            $table->string('nama_lengkap');
            $table->enum('jk', ['l','p'])->default('l');
            $table->integer('jurusan_id')->default(0);
            $table->string('photo')->nullable();
            $table->json('data_pribadi')->nullable();
            $table->json('orangtua_wali')->nullable();
            $table->json('rincian')->nullable();
            $table->json('registrasi')->nullable();
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
        Schema::dropIfExists('ppdbs');
    }
}
