<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nign', 50);
            $table->string('nama', 40);
            $table->string('pendidikan_terakhir',100);
            $table->enum('jk', ['l','p'])->default('l');
            $table->string('tempat_lahir', 30);
            $table->date('tanggal_lahir');
            $table->boolean('status')->default(1);
            $table->date('tanggal_masuk');
            $table->text('alamat');
            $table->string('telepon', 40);
            $table->string('agama', 10);
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
        Schema::dropIfExists('teachers');
    }
}
