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
        Schema::create('pkg_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kompetensi');
            $table->string('pertanyaan');
            $table->timestamps();
            $table->foreign('id_kompetensi')->references('id')->on('siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pkg_siswas');
    }
};
