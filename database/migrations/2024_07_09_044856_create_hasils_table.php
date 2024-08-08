<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_guru');
            $table->unsignedBigInteger('id_pkgAtasan');
            $table->unsignedBigInteger('id_pkgGuru');
            $table->unsignedBigInteger('id_pkgSiswa');
            $table->string('jawaban');
            $table->string('kinerja');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_guru')->references('id')->on('data_gurus')->onDelete('cascade');
            $table->foreign('id_pkgAtasan')->references('id')->on('pkg_atasans')->onDelete('cascade');
            $table->foreign('id_pkgGuru')->references('id')->on('pkg_gurus')->onDelete('cascade');
            $table->foreign('id_pkgSiswa')->references('id')->on('pkg_siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasils');
    }
};
