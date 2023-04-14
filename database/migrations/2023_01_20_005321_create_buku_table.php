<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('cover', 20);
        $table->string('isbn_issn', 50);
        $table->string('judul_buku', 100);
        $table->date('tahun_terbit');
        $table->string('tempat_terbit', 150);
        $table->string('stok_buku', 50);
        $table->string('deskripsi', 255);
        $table->bigInteger('kategori_id');
        $table->bigInteger('rak_id');
        $table->bigInteger('penulis_id');
        $table->bigInteger('penerbit_id');
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
        Schema::dropIfExists('buku');
    }
}
