<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nis');
            $table->year('tahun_masuk')->default(date('Y'));
            $table->string('name', 50);
            $table->enum('jk', ['l','p']);
            $table->integer('kelas_id')->default(0);
            $table->integer('jurusan_id')->default(0);
            $table->enum('status', ['aktif', 'lulus', 'mutasi', 'dikeluarkan', 'mengundurkan diri', 'putus sekolah', 'wafat', 'hilang', 'lainnya']);
            $table->string('photo')->default('default.png');
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}