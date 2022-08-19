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
        Schema::create('sepatus', function (Blueprint $table) {
            $table->id();
            $table->string('s_foto');
            $table->string('s_nama');
            $table->integer('s_hargabeli');
            $table->integer('s_hargajual');
            $table->string('s_kategori');
            $table->text('s_deskripsi');
            $table->string('s_bahan');
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('sepatus');
    }
};
